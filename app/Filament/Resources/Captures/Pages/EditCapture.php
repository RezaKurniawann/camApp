<?php

namespace App\Filament\Resources\Captures\Pages;

use App\Filament\Resources\Captures\CaptureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCapture extends EditRecord
{
    protected static string $resource = CaptureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
