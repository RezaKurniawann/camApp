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
                    ->counts('cameras')
                    ->sortable()
                    ->alignCenter()
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
                TextColumn::make('sub_location')
                    ->label('Sub Location')
                    ->searchable(),
                // TextColumn::make('location.name')
                //     ->label('Location')
                //     ->searchable(),
                // TextColumn::make('location.company.name')
                //     ->label('Company')
                //     ->searchable(),
                TextColumn::make('location.company.region.name')
                    ->label('Location')
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