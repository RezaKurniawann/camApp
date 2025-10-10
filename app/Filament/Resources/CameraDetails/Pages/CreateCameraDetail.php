<?php

namespace App\Filament\Resources\CameraDetails\Pages;

use App\Filament\Resources\CameraDetails\CameraDetailResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateCameraDetail extends CreateRecord
{
    protected static string $resource = CameraDetailResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateAnotherFormAction()
                ->label('Create')
                ->color('primary'),
            $this->getCancelFormAction(),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['details']) && is_array($data['details'])) {
            $processedDetails = [];
            
            foreach ($data['details'] as $detail) {
                $processedDetail = $detail;
                if (isset($detail['image']) && str_starts_with($detail['image'], 'data:image')) {
                    preg_match('/data:image\/(\w+);base64,(.*)/', $detail['image'], $matches);
                    
                    if (count($matches) === 3) {
                        $imageExtension = $matches[1];
                        $imageData = base64_decode($matches[2]);
                        $fileName = 'camera-details/' . Str::uuid() . '.' . $imageExtension;
                        Storage::disk('public')->put($fileName, $imageData);
                        $processedDetail['image'] = $fileName;
                    }
                }
                
                $processedDetails[] = $processedDetail;
            }
            
            $data['details'] = $processedDetails;
        }
        
        return $data;
    }
}