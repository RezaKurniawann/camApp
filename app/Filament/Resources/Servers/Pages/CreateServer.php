<?php

namespace App\Filament\Resources\Servers\Pages;

use App\Filament\Resources\Servers\ServerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServer extends CreateRecord
{
    protected static string $resource = ServerResource::class;

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
