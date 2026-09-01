<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('email')->email()->required()->maxLength(255)->unique(ignoreRecord: true),
                TextInput::make('phone')->label('Phone')->maxLength(20),
                TextInput::make('cnic')->label('CNIC')->maxLength(20)->unique(ignoreRecord: true),
                TextInput::make('password')->password()->revealable()->requiredOn('create')->minLength(8),
                Toggle::make('status')->default(true),
            ]);
    }
}
