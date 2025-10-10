<?php

namespace App\Filament\Resources\Cameras;

use App\Filament\Resources\Cameras\Pages\CreateCamera;
use App\Filament\Resources\Cameras\Pages\EditCamera;
use App\Filament\Resources\Cameras\Pages\ListCameras;
use App\Filament\Resources\Cameras\Schemas\CameraForm;
use App\Filament\Resources\Cameras\Tables\CamerasTable;
use App\Models\Camera;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class CameraResource extends Resource
{
    protected static ?string $model = Camera::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-video-camera';
    protected static string | UnitEnum | null $navigationGroup = 'Assets';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CameraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CamerasTable::configure($table);
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
            'index' => ListCameras::route('/'),
            'create' => CreateCamera::route('/create'),
            'edit' => EditCamera::route('/{record}/edit'),
        ];
    }
}
