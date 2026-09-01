<?php

namespace App\Filament\Resources\Listings\Schemas;

use App\Models\Property;
use App\Models\Unit;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('property_id')->label('Property')->options(Property::query()->pluck('name', 'id'))->searchable()->required(),
                Select::make('unit_id')->label('Unit')->options(Unit::query()->pluck('name', 'id'))->searchable()->nullable(),
                Select::make('created_by')->label('Created By')->options(User::query()->pluck('name', 'id'))->searchable()->required(),
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord: true),
                Select::make('listing_type')->options([
                    'sale' => 'Sale',
                    'rent' => 'Rent',
                ])->required(),
                TextInput::make('asking_price')->numeric()->required(),
                Textarea::make('description')->rows(4),
                Select::make('status')->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'closed' => 'Closed',
                ])->default('draft')->required(),
                DateTimePicker::make('published_at')->nullable(),
            ]);
    }
}
