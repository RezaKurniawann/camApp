<?php

namespace App\Filament\Resources\CameraDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use Filament\Schemas\Schema;
use App\Models\Capture;
use App\Models\Camera;

class CameraDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('camera_id')
                    ->label('Camera')
                    ->relationship('camera', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->columnSpan('full')
                    ->disabled(fn(string $operation): bool => $operation === 'view'),

                ViewField::make('camera_info')
                    ->label('')
                    ->view('filament.forms.components.camera-info')
                    ->viewData(fn($get) => [
                        'camera' => $get('camera_id')
                            ? Camera::with([
                                'brand',
                                'type',
                                'cameraVariant',
                                'category',
                                'server',
                                'location.company'
                            ])->find($get('camera_id'))
                            : null
                    ])
                    ->visible(fn(callable $get) => !empty($get('camera_id')))
                    ->columnSpan('full')
                    ->helperText('Click the camera name to view details'),

                ViewField::make('details')
                    ->label('Camera Images & Details')
                    ->view('filament.forms.components.camera-details-table')
                    ->viewData(fn(string $operation) => [
                        'captureTypes' => Capture::pluck('name', 'id')->toArray(),
                        'isViewMode' => $operation === 'view'
                    ])
                    ->columnSpan('full')
                    ->default([]),
            ])
            ->columns(2);
    }
}