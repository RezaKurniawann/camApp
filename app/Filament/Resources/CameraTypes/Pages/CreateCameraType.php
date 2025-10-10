<?php

namespace App\Filament\Resources\CameraTypes\Pages;

use App\Filament\Resources\CameraTypes\CameraTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCameraType extends CreateRecord
{
    protected static string $resource = CameraTypeResource::class;

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
