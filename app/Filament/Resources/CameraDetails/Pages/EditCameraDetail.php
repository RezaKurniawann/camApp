<?php

namespace App\Filament\Resources\CameraDetails\Pages;

use App\Filament\Resources\CameraDetails\CameraDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditCameraDetail extends EditRecord
{
    protected static string $resource = CameraDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['details']) && is_array($data['details'])) {
            $oldDetails = $this->record->details ?? [];
            $processedDetails = [];
            
            foreach ($data['details'] as $index => $detail) {
                $processedDetail = $detail;
                
                // Check if image is base64 (new upload)
                if (isset($detail['image']) && str_starts_with($detail['image'], 'data:image')) {
                    // Delete old image if exists
                    if (isset($oldDetails[$index]['image']) && 
                        !$this->isDefaultImage($oldDetails[$index]['image'])) {
                        Storage::disk('public')->delete($oldDetails[$index]['image']);
                    }
                    
                    // Extract base64 data
                    preg_match('/data:image\/(\w+);base64,(.*)/', $detail['image'], $matches);
                    
                    if (count($matches) === 3) {
                        $imageExtension = $matches[1];
                        $imageData = base64_decode($matches[2]);
                        
                        // Generate unique filename
                        $fileName = 'camera-details/' . Str::uuid() . '.' . $imageExtension;
                        
                        // Save to storage
                        Storage::disk('public')->put($fileName, $imageData);
                        
                        // Update image path
                        $processedDetail['image'] = $fileName;
                    }
                }
                
                $processedDetails[] = $processedDetail;
            }
            
            // Delete images that were removed from the array
            $newImagePaths = collect($processedDetails)->pluck('image')->filter()->toArray();
            $oldImagePaths = collect($oldDetails)->pluck('image')->filter()->toArray();
            $deletedImages = array_diff($oldImagePaths, $newImagePaths);
            
            foreach ($deletedImages as $deletedImage) {
                if (!$this->isDefaultImage($deletedImage)) {
                    Storage::disk('public')->delete($deletedImage);
                }
            }
            
            $data['details'] = $processedDetails;
        }
        
        return $data;
    }

    protected function isDefaultImage($imagePath): bool
    {
        if (empty($imagePath)) {
            return false;
        }

        $defaultPaths = [
            'images/no-image.png',
            '/images/no-image.png',
            'public/images/no-image.png',
            'no-image.png',
        ];

        return in_array($imagePath, $defaultPaths) || 
               str_contains($imagePath, 'no-image.png');
    }
}