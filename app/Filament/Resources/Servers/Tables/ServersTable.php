<?php

namespace App\Filament\Resources\Servers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('type.name')
                    ->label('Type')
                    ->searchable(),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable(),
                TextColumn::make('noAsset')
                    ->label('No Asset')
                    ->searchable(),
                TextColumn::make('model')
                    ->searchable(),
                TextColumn::make('portAvailable')
                    ->label('Port Available')
                    ->searchable(),
                TextColumn::make('portUse')
                    ->label('Port Use')
                    ->searchable(),
                TextColumn::make('hddSize')
                    ->label('HDD Size')
                    ->searchable(),
                TextColumn::make('ipAddress')
                    ->label('IP Address')
                    ->searchable(),
                TextColumn::make('cameras_count')
                    ->label('Cameras')
                    ->counts('cameras')
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-o-camera')
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('subLocation.name')
                    ->label('Sub Location')
                    ->searchable(),
                TextColumn::make('subLocation.location.name')
                    ->label('Location')
                    ->searchable(),
                TextColumn::make('subLocation.location.company.name')
                    ->label('Company')
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
                SelectFilter::make('type_id')
                    ->label('Type')
                    ->relationship('type', 'name'),
                SelectFilter::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name'),
                SelectFilter::make('sub_location_id')
                    ->label('Sub Location')
                    ->relationship('subLocation', 'name'),
                SelectFilter::make('location_id')
                    ->label('Location')
                    ->relationship('subLocation.location', 'name'),
                SelectFilter::make('company_id')
                    ->label('Company')
                    ->relationship('subLocation.location.company', 'name'),  
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