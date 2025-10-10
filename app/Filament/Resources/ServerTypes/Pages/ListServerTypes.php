<?php

namespace App\Filament\Resources\ServerTypes\Pages;

use App\Filament\Resources\ServerTypes\ServerTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServerTypes extends ListRecords
{
    protected static string $resource = ServerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
