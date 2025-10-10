<?php

namespace App\Filament\Resources\Servers\Schemas;

use App\Models\SubLocation;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('noAsset')
                    ->label('Asset Number')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                
                TextInput::make('model')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Select::make('type_id')
                    ->label('Server Type')
                    ->relationship('type', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpan(1),
                
                Select::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpan(1),
                
                Select::make('sub_location_id')
                    ->label('Sub Location')
                    ->relationship('subLocation', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn ($record) => 
                        $record->name . ' (' . 
                        $record->location->name . ')'
                    )
                    ->getSearchResultsUsing(fn (string $search) => 
                        SubLocation::query()
                            ->where('name', 'like', "%{$search}%")
                            ->orWhereHas('location', fn ($query) =>
                                $query->where('name', 'like', "%{$search}%")
                            )
                            ->with('location')
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(fn ($record) =>
                                [$record->id => $record->name . ' (' . $record->location->name . ')']
                            )
                            ->toArray()
                    )
                    ->getOptionLabelsUsing(fn (array $values): array =>
                        SubLocation::whereIn('id', $values)
                            ->with('location')
                            ->get()
                            ->mapWithKeys(fn ($record) =>
                                [$record->id => $record->name . ' (' . $record->location->name . ')']
                            )
                            ->toArray()
                    )
                    ->columnSpan(1),

                TextInput::make('portAvailable')
                    ->label('Ports Available')
                    ->required()
                    ->default(0)
                    ->columnSpan(1),
                
                TextInput::make('portUse')
                    ->label('Ports Used')
                    ->required()
                    ->default(0)
                    ->columnSpan(1),
                
                TextInput::make('hddSize')
                    ->label('HDD Size')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., 2TB, 500GB')
                    ->columnSpan(1),
                
                TextInput::make('ipAddress')
                    ->label('IP Address')
                    ->maxLength(255)
                    ->placeholder('192.168.1.1')
                    ->columnSpan(1),
            ])
            ->columns(3);
    }
}