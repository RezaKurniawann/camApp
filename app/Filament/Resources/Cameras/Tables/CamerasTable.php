<?php

namespace App\Filament\Resources\Cameras\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CamerasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('images')
                    ->label('Image')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('/images/no-image.png')),
                TextColumn::make('noAsset')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('server.name')
                    ->label('Server')
                    ->searchable(),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable(),
                TextColumn::make('model')
                    ->searchable(),
                TextColumn::make('cameraVariant.name')
                    ->label('Camera Variant')
                    ->searchable(),
                TextColumn::make('type.name')
                    ->label('Type')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                TextColumn::make('lens')
                    ->searchable(),
                TextColumn::make('resolution')
                    ->searchable(),
                TextColumn::make('ipAddress')
                    ->searchable(),
                TextColumn::make('channel')
                    ->searchable(),
                TextColumn::make('coordinate')
                    ->searchable(),
                TextColumn::make('purpose')
                    ->searchable(),
                TextColumn::make('sub_location')
                    ->label('Sub Location')
                    ->searchable(),
                TextColumn::make('location.name')
                    ->label('Location')
                    ->searchable(),
                TextColumn::make('location.company.name')
                    ->label('Company')
                    ->searchable(),
                TextColumn::make('location.company.region.name')
                    ->label('Region')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('server_id')
                    ->label('Server')
                    ->relationship('Server', 'name'),
                SelectFilter::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name'),
                SelectFilter::make('type_id')
                    ->label('Type')
                    ->relationship('type', 'name'),
                SelectFilter::make('location_id')
                    ->label('Location')
                    ->relationship('location', 'name'),
                SelectFilter::make('company_id')
                    ->label('Company')
                    ->relationship('location.company', 'name'),
                SelectFilter::make('region_id')
                    ->label('Region')
                    ->relationship('location.company.region', 'name'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
