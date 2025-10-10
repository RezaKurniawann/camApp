<?php

namespace App\Filament\Resources\CameraVariants;

use App\Filament\Resources\CameraVariants\Pages\CreateCameraVariant;
use App\Filament\Resources\CameraVariants\Pages\EditCameraVariant;
use App\Filament\Resources\CameraVariants\Pages\ListCameraVariants;
use App\Filament\Resources\CameraVariants\Schemas\CameraVariantForm;
use App\Filament\Resources\CameraVariants\Tables\CameraVariantsTable;
use App\Models\CameraVariant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CameraVariantResource extends Resource
{
    protected static ?string $model = CameraVariant::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-swatch';

    protected static string | UnitEnum | null $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return CameraVariantForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CameraVariantsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Camera Variants';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCameraVariants::route('/'),
            'create' => CreateCameraVariant::route('/create'),
            'edit' => EditCameraVariant::route('/{record}/edit'),
        ];
    }
}
