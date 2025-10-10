<?php

namespace App\Filament\Resources\CameraCategories\Pages;

use App\Filament\Resources\CameraCategories\CameraCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCameraCategories extends ListRecords
{
    protected static string $resource = CameraCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
