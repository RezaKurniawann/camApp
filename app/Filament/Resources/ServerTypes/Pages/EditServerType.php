<?php

namespace App\Filament\Resources\ServerTypes\Pages;

use App\Filament\Resources\ServerTypes\ServerTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServerType extends EditRecord
{
    protected static string $resource = ServerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
