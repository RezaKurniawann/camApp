<?php

namespace App\Filament\Resources\ServerTypes\Pages;

use App\Filament\Resources\ServerTypes\ServerTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServerType extends CreateRecord
{
    protected static string $resource = ServerTypeResource::class;

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
