<?php

namespace App\Filament\Resources\SubLocations\Pages;

use App\Filament\Resources\SubLocations\SubLocationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubLocation extends CreateRecord
{
    protected static string $resource = SubLocationResource::class;

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
