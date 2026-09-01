<?php

namespace App\Filament\Resources\Bids\Schemas;

use App\Models\Listing;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BidForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('listing_id')->label('Listing')->options(Listing::query()->pluck('title', 'id'))->searchable()->required(),
                Select::make('bidder_id')->label('Bidder')->options(User::query()->pluck('name', 'id'))->searchable()->required(),
                TextInput::make('amount')->numeric()->required(),
                Textarea::make('message')->rows(4),
                DateTimePicker::make('expires_at')->nullable(),
                Select::make('status')->options([
                    'submitted' => 'Submitted',
                    'accepted' => 'Accepted',
                    'rejected' => 'Rejected',
                ])->default('submitted')->required(),
            ]);
    }
}
