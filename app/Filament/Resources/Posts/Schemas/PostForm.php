<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')->label('User')->options(User::query()->pluck('name', 'id'))->searchable()->required(),
                TextInput::make('title')->required()->maxLength(255),
                Textarea::make('content')->rows(6)->required(),
                Select::make('status')->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived',
                ])->default('draft')->required(),
            ]);
    }
}
