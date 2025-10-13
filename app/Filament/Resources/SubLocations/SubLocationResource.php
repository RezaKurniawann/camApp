<?php

namespace App\Filament\Resources\SubLocations;

use App\Filament\Resources\SubLocations\Pages\CreateSubLocation;
use App\Filament\Resources\SubLocations\Pages\EditSubLocation;
use App\Filament\Resources\SubLocations\Pages\ListSubLocations;
use App\Filament\Resources\SubLocations\Schemas\SubLocationForm;
use App\Filament\Resources\SubLocations\Tables\SubLocationsTable;
use App\Models\SubLocation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class SubLocationResource extends Resource
{
    protected static ?string $model = SubLocation::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-library';

    protected static string | UnitEnum | null $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 3;


    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return SubLocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubLocationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Sub Locations';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubLocations::route('/'),
            'create' => CreateSubLocation::route('/create'),
            'edit' => EditSubLocation::route('/{record}/edit'),
        ];
    }
}
