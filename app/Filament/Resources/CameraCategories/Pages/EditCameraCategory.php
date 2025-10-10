<?php

namespace App\Filament\Resources\CameraCategories\Pages;

use App\Filament\Resources\CameraCategories\CameraCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCameraCategory extends EditRecord
{
    protected static string $resource = CameraCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
