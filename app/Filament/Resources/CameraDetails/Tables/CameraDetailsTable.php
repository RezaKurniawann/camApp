<?php

namespace App\Filament\Resources\CameraDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Table;

class CameraDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('camera.server.noAsset')
                    ->label('No Asset Server')
                    ->searchable(),
                TextColumn::make('camera.server.name')
                    ->label('Server Name')
                    ->searchable(),
                TextColumn::make('camera.noAsset')
                    ->label('No Asset Camera')
                    ->searchable(),
                TextColumn::make('camera.name')
                    ->label('Camera Name')
                    ->searchable(),
                TextColumn::make('details')
                    ->label('Total Images')
                    ->badge()
                    ->color('success')
                    ->getStateUsing(function ($record) {
                        if (!is_array($record->details) || empty($record->details)) {
                            return 0;
                        }
                        $existingImages = array_filter($record->details, function ($detail) {
                            return isset($detail['image']) && Storage::disk('public')->exists($detail['image']);
                        });

                        return count($existingImages);
                    })
                    ->icon('heroicon-o-photo')
                    ->sortable(query: function ($query, $direction) {
                        return $query->orderByRaw("JSON_LENGTH(COALESCE(details, '[]')) {$direction}");
                    })
                    ->alignCenter(),
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
                SelectFilter::make('camera.server_id')
                    ->label('Server')
                    ->relationship('camera.server', 'name'),
                SelectFilter::make('camera_id')
                    ->label('Camera')
                    ->relationship('camera', 'name'),
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
