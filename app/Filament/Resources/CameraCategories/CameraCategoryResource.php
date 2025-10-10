<?php

namespace App\Filament\Resources\CameraCategories;

use App\Filament\Resources\CameraCategories\Pages\CreateCameraCategory;
use App\Filament\Resources\CameraCategories\Pages\EditCameraCategory;
use App\Filament\Resources\CameraCategories\Pages\ListCameraCategories;
use App\Filament\Resources\CameraCategories\Schemas\CameraCategoryForm;
use App\Filament\Resources\CameraCategories\Tables\CameraCategoriesTable;
use App\Models\CameraCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CameraCategoryResource extends Resource
{
    protected static ?string $model = CameraCategory::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder-open';

    protected static string | UnitEnum | null $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return CameraCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CameraCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Camera Categories';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCameraCategories::route('/'),
            'create' => CreateCameraCategory::route('/create'),
            'edit' => EditCameraCategory::route('/{record}/edit'),
        ];
    }
}
