<?php

namespace App\Filament\Resources\CameraDetails\Pages;

use App\Filament\Resources\CameraDetails\CameraDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCameraDetails extends ListRecords
{
    protected static string $resource = CameraDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
