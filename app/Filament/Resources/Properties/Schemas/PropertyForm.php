<?php

namespace App\Filament\Resources\Properties\Schemas;

use App\Models\PropertyType;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PropertyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('owner_id')->label('Owner')->options(User::query()->pluck('name', 'id'))->searchable()->required(),
                Select::make('property_type_id')->label('Property Type')->options(PropertyType::query()->pluck('name', 'id'))->searchable()->required(),
                TextInput::make('property_code')->required()->maxLength(50)->unique(ignoreRecord: true),
                TextInput::make('name')->required()->maxLength(255),
                Textarea::make('description')->rows(4),
                Textarea::make('address')->required()->rows(3),
                TextInput::make('city')->required()->maxLength(100),
                TextInput::make('area')->numeric()->required(),
                TextInput::make('area_unit')->required()->maxLength(20),
                Select::make('status')->options([
                    'available' => 'Available',
                    'sold' => 'Sold',
                    'rented' => 'Rented',
                ])->default('available')->required(),
            ]);
    }
}
