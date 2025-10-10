<?php

namespace App\Filament\Resources\CameraVariants\Pages;

use App\Filament\Resources\CameraVariants\CameraVariantResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCameraVariant extends CreateRecord
{
    protected static string $resource = CameraVariantResource::class;

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
