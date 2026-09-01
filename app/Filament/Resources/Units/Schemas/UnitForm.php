<?php

namespace App\Filament\Resources\Units\Schemas;

use App\Models\Property;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('property_id')->label('Property')->options(Property::query()->pluck('name', 'id'))->searchable()->required(),
                TextInput::make('unit_code')->required()->maxLength(50),
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('floor')->maxLength(50),
                TextInput::make('bedrooms')->numeric()->integer(),
                TextInput::make('bathrooms')->numeric()->integer(),
                TextInput::make('area')->numeric(),
                TextInput::make('rent_amount')->numeric(),
                TextInput::make('sale_price')->numeric(),
                Select::make('status')->options([
                    'available' => 'Available',
                    'occupied' => 'Occupied',
                    'reserved' => 'Reserved',
                ])->default('available')->required(),
            ]);
    }
}
