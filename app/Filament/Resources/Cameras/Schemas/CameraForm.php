<?php

namespace App\Filament\Resources\Cameras\Schemas;

use App\Models\Server;
use App\Models\Location;
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
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->name . ' (' .
                            $record->portUse . '/' . $record->portAvailable . ' ports used)'
                    )
                    ->getSearchResultsUsing(
                        fn(string $search) =>
                        Server::query()
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('noAsset', 'like', "%{$search}%")
                            ->withCount('cameras')
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(fn($record) => [
                                $record->id => $record->name . ' (' .
                                    $record->cameras_count . '/' . $record->portAvailable . ' ports used)' .
                                    ($record->cameras_count >= $record->portAvailable ? ' - FULL' : '')
                            ])
                            ->toArray()
                    )
                    ->getOptionLabelsUsing(
                        fn(array $values): array =>
                        Server::whereIn('id', $values)
                            ->withCount('cameras')
                            ->get()
                            ->mapWithKeys(fn($record) => [
                                $record->id => $record->name . ' (' .
                                    $record->cameras_count . '/' . $record->portAvailable . ' ports used)' .
                                    ($record->cameras_count >= $record->portAvailable ? ' - FULL' : '')
                            ])
                            ->toArray()
                    )
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        if ($state) {
                            $server = Server::withCount('cameras')->find($state);
                            if ($server && $server->cameras_count >= $server->portAvailable) {
                                $set('server_id', null);
                            }
                        }
                    })
                    ->helperText(function ($state) {
                        if (!$state) {
                            return null;
                        }
                        $server = Server::withCount('cameras')->find($state);
                        if (!$server) {
                            return null;
                        }

                        $remaining = max(0, $server->portAvailable - $server->cameras_count);

                        if ($remaining === 0) {
                            return '⚠️ Server ini sudah penuh! Pilih server lain.';
                        }

                        return "✓ Sisa port tersedia: {$remaining}";
                    })
                    ->validationMessages([
                        'required' => 'Server wajib dipilih.',
                    ])
                    ->rules([
                        function ($record) {
                            return function (string $attribute, $value, \Closure $fail) use ($record) {
                                if (!$value) {
                                    return;
                                }

                                $server = Server::withCount('cameras')->find($value);

                                if (!$server) {
                                    $fail('Server tidak ditemukan.');
                                    return;
                                }

                                $currentUsage = $server->cameras_count;
                                if ($record && $record->server_id == $value) {
                                    $currentUsage--;
                                }

                                if ($currentUsage >= $server->portAvailable) {
                                    $fail("Server {$server->name} sudah penuh ({$server->portAvailable}/{$server->portAvailable} ports terpakai). Pilih server lain.");
                                }
                            };
                        },
                    ])
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

                Select::make('location_id')
                    ->label('Location')
                    ->relationship('location', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->company->region->code . ' - ' .
                            $record->company->code . ' - ' .
                            $record->code
                    )
                    ->getSearchResultsUsing(
                        fn(string $search) =>
                        Location::query()
                            ->where('name', 'like', "%{$search}%")
                            ->orWhereHas(
                                'company',
                                fn($query) =>
                                $query->where('name', 'like', "%{$search}%")
                                    ->orWhereHas(
                                        'region',
                                        fn($r) =>
                                        $r->where('name', 'like', "%{$search}%")
                                    )
                            )
                            ->with(['company.region'])
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(fn($record) => [
                                $record->id => $record->name . ' - ' .
                                    $record->company->name . ' - ' .
                                    $record->company->region->name
                            ])
                            ->toArray()
                    )
                    ->getOptionLabelsUsing(
                        fn(array $values): array =>
                        Location::whereIn('id', $values)
                            ->with(['company.region'])
                            ->get()
                            ->mapWithKeys(fn($record) => [
                                $record->id => $record->name . ' - ' .
                                    $record->company->name . ' - ' .
                                    $record->company->region->name
                            ])
                            ->toArray()
                    )
                    ->columnSpan(1),
                TextInput::make('sub_location')
                    ->label('Sub Location')
                    ->maxLength(255)
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
