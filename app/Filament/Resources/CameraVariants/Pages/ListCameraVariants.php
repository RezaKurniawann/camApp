<?php

namespace App\Filament\Resources\CameraVariants\Pages;

use App\Filament\Resources\CameraVariants\CameraVariantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCameraVariants extends ListRecords
{
    protected static string $resource = CameraVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
