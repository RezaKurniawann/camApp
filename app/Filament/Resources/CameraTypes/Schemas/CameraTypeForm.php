<?php

namespace App\Filament\Resources\CameraTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CameraTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
