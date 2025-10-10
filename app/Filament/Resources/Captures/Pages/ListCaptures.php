<?php

namespace App\Filament\Resources\Captures\Pages;

use App\Filament\Resources\Captures\CaptureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaptures extends ListRecords
{
    protected static string $resource = CaptureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
