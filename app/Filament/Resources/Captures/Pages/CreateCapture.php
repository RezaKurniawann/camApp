<?php

namespace App\Filament\Resources\Captures\Pages;

use App\Filament\Resources\Captures\CaptureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCapture extends CreateRecord
{
    protected static string $resource = CaptureResource::class;

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
