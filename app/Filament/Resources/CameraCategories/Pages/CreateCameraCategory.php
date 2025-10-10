<?php

namespace App\Filament\Resources\CameraCategories\Pages;

use App\Filament\Resources\CameraCategories\CameraCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCameraCategory extends CreateRecord
{
    protected static string $resource = CameraCategoryResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateAnotherFormAction()
            ->label('Create')
            ->color('primary'),
            $this->getCancelFormAction(),
        ];
    }
}
