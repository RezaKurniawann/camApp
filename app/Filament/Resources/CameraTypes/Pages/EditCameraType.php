<?php

namespace App\Filament\Resources\CameraTypes\Pages;

use App\Filament\Resources\CameraTypes\CameraTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCameraType extends EditRecord
{
    protected static string $resource = CameraTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
