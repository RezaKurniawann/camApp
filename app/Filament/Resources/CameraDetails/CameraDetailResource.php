<?php

namespace App\Filament\Resources\CameraDetails;

use App\Filament\Resources\CameraDetails\Pages\CreateCameraDetail;
use App\Filament\Resources\CameraDetails\Pages\EditCameraDetail;
use App\Filament\Resources\CameraDetails\Pages\ListCameraDetails;
use App\Filament\Resources\CameraDetails\Schemas\CameraDetailForm;
use App\Filament\Resources\CameraDetails\Tables\CameraDetailsTable;
use App\Models\CameraDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CameraDetailResource extends Resource
{
    protected static ?string $model = CameraDetail::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-group';
    protected static string | UnitEnum | null $navigationGroup = 'Assets';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return CameraDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CameraDetailsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Camera Details';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCameraDetails::route('/'),
            'create' => CreateCameraDetail::route('/create'),
            'edit' => EditCameraDetail::route('/{record}/edit'),
        ];
    }

    public static function beforeSave($record, array $data): array
    {
        if (isset($data['details']) && is_array($data['details'])) {
            $processedDetails = [];

            foreach ($data['details'] as $detail) {
                $processedDetail = $detail;

                // Check if image is base64
                if (isset($detail['image']) && str_starts_with($detail['image'], 'data:image')) {
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

            $data['details'] = $processedDetails;
        }

        return $data;
    }
}
