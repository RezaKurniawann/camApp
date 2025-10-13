<?php

namespace App\Filament\Resources\Captures;

use App\Filament\Resources\Captures\Pages\CreateCapture;
use App\Filament\Resources\Captures\Pages\EditCapture;
use App\Filament\Resources\Captures\Pages\ListCaptures;
use App\Filament\Resources\Captures\Schemas\CaptureForm;
use App\Filament\Resources\Captures\Tables\CapturesTable;
use App\Models\Capture;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CaptureResource extends Resource
{
    protected static ?string $model = Capture::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string | UnitEnum | null $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 10;


    public static function form(Schema $schema): Schema
    {
        return CaptureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CapturesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Number of Captures';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCaptures::route('/'),
            'create' => CreateCapture::route('/create'),
            'edit' => EditCapture::route('/{record}/edit'),
        ];
    }
}
