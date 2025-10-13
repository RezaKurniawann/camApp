<?php

namespace App\Filament\Resources\Servers\Schemas;

use App\Models\Location;
use Filament\Forms\Components\Placeholder;
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

                Select::make('location_id')
                    ->label('Location')
                    ->relationship('location', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->company->region->name)
                    ->getSearchResultsUsing(
                        fn(string $search) =>
                        Location::query()
                            ->where('name', 'like', "%{$search}%")
                            ->orWhereHas(
                                'company',
                                fn($query) =>
                                $query->where('name', 'like', "%{$search}%")
                            )
                            ->orWhereHas(
                                'company.region',
                                fn($query) =>
                                $query->where('name', 'like', "%{$search}%")
                            )
                            ->with(['company.region'])
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(
                                fn($record) =>
                                [$record->id => $record->name . ' (' . $record->company->name . ' - ' . $record->company->region->name . ')']
                            )
                            ->toArray()
                    )
                    ->getOptionLabelsUsing(
                        fn(array $values): array =>
                        Location::whereIn('id', $values)
                            ->with(['company.region'])
                            ->get()
                            ->mapWithKeys(
                                fn($record) =>
                                [$record->id => $record->company->region->name]
                            )
                            ->toArray()
                    )
                    ->columnSpan(1),

                TextInput::make('sub_location')
                    ->label('Sub Location')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('portAvailable')
                    ->label('Total Ports')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->columnSpan(1),

                Placeholder::make('port_usage')
                    ->label('Ports Used')
                    ->content(function ($record) {
                        if (!$record) {
                            return '0 / 0';
                        }

                        $used = $record->cameras()->count();
                        $total = $record->portAvailable;
                        $percentage = $total > 0 ? round(($used / $total) * 100, 1) : 0;

                        $status = $used >= $total ? '🔴 FULL' : ($percentage >= 80 ? '🟡' : '🟢');

                        return "{$used} / {$total} ports ({$percentage}%) {$status}";
                    })
                    ->columnSpan(1)
                    ->visible(fn($record) => $record !== null),

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
