<?php

namespace App\Filament\Resources\CameraVariants\Pages;

use App\Filament\Resources\CameraVariants\CameraVariantResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCameraVariant extends EditRecord
{
    protected static string $resource = CameraVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
