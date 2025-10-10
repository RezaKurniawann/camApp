<?php

namespace App\Filament\Resources\CameraTypes\Pages;

use App\Filament\Resources\CameraTypes\CameraTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCameraTypes extends ListRecords
{
    protected static string $resource = CameraTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
