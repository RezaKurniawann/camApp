<?php

namespace App\Filament\Resources\ServerTypes;

use App\Filament\Resources\ServerTypes\Pages\CreateServerType;
use App\Filament\Resources\ServerTypes\Pages\EditServerType;
use App\Filament\Resources\ServerTypes\Pages\ListServerTypes;
use App\Filament\Resources\ServerTypes\Schemas\ServerTypeForm;
use App\Filament\Resources\ServerTypes\Tables\ServerTypesTable;
use App\Models\ServerType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ServerTypeResource extends Resource
{
    protected static ?string $model = ServerType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-server-stack';

    protected static string | UnitEnum | null $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return ServerTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServerTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Server Types';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServerTypes::route('/'),
            'create' => CreateServerType::route('/create'),
            'edit' => EditServerType::route('/{record}/edit'),
        ];
    }
}
