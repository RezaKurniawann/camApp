<?php

namespace App\Filament\Resources\Cameras\Schemas;

use App\Models\SubLocation;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CameraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


                TextInput::make('noAsset')
                    ->label('Asset Number')
                    ->required()
                    ->unique(ignoreRecord: true)
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
                Select::make('server_id')
                    ->label('Server')
                    ->relationship('server', 'name')
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
                Select::make('camera_variant_id')
                    ->label('Camera Variant')
                    ->relationship('cameraVariant', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpan(1),
                Select::make('type_id')
                    ->label('Camera Type')
                    ->relationship('type', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpan(1),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
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
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->name . ' (' .
                            $record->location->name . ')'
                    )
                    ->getSearchResultsUsing(
                        fn(string $search) =>
                        SubLocation::query()
                            ->where('name', 'like', "%{$search}%")
                            ->orWhereHas(
                                'location',
                                fn($query) =>
                                $query->where('name', 'like', "%{$search}%")
                            )
                            ->with('location')
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(
                                fn($record) =>
                                [$record->id => $record->name . ' (' . $record->location->name . ')']
                            )
                            ->toArray()
                    )
                    ->getOptionLabelsUsing(
                        fn(array $values): array =>
                        SubLocation::whereIn('id', $values)
                            ->with('location')
                            ->get()
                            ->mapWithKeys(
                                fn($record) =>
                                [$record->id => $record->name . ' (' . $record->location->name . ')']
                            )
                            ->toArray()
                    )
                    ->columnSpan(1),
                TextInput::make('lens')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                TextInput::make('resolution')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                TextInput::make('ipAddress')
                    ->label('IP Address')
                    ->maxLength(255)
                    ->placeholder('192.168.1.1')
                    ->columnSpan(1),
                TextInput::make('channel')
                    ->required()
                    ->numeric()
                    ->columnSpan(1),
                TextInput::make('coordinate')
                    ->maxLength(255)
                    ->columnSpan(1),
                TextInput::make('purpose')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                FileUpload::make('images')
                    ->label('Camera Image')
                    ->image()
                    ->directory('cameras')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->imagePreviewHeight('320')
                    ->panelLayout('integrated')
                    ->columnSpan(3)
                    ->helperText('Format: JPG, PNG. Maksimal 2MB per gambar.'),
            ])
            ->columns(3);
    }
}
