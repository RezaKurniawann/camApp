<?php

namespace App\Filament\Resources\CameraTypes;

use App\Filament\Resources\CameraTypes\Pages\CreateCameraType;
use App\Filament\Resources\CameraTypes\Pages\EditCameraType;
use App\Filament\Resources\CameraTypes\Pages\ListCameraTypes;
use App\Filament\Resources\CameraTypes\Schemas\CameraTypeForm;
use App\Filament\Resources\CameraTypes\Tables\CameraTypesTable;
use App\Models\CameraType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CameraTypeResource extends Resource
{
    protected static ?string $model = CameraType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static string | UnitEnum | null $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return CameraTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CameraTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Camera Types';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCameraTypes::route('/'),
            'create' => CreateCameraType::route('/create'),
            'edit' => EditCameraType::route('/{record}/edit'),
        ];
    }
}
