<?php

namespace App\Filament\Resources\Posts\Widgets;

use App\Models\Bid;
use App\Models\Listing;
use App\Models\Post;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Unit;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->icon('heroicon-o-users'),

            Stat::make('Total Posts', Post::count())
                ->description('All posts')
                ->icon('heroicon-o-document-text'),

            Stat::make('Property Types', PropertyType::count())
                ->description('All property categories')
                ->icon('heroicon-o-tag'),

            Stat::make('Properties', Property::count())
                ->description('All property records')
                ->icon('heroicon-o-home-modern'),

            Stat::make('Units', Unit::count())
                ->description('All units in properties')
                ->icon('heroicon-o-building-office-2'),

            Stat::make('Listings', Listing::count())
                ->description('All active property listings')
                ->icon('heroicon-o-clipboard-document-list'),

            Stat::make('Bids', Bid::count())
                ->description('All submitted bids')
                ->icon('heroicon-o-currency-dollar'),

            Stat::make('Published Posts', Post::where('status', 'published')->count())
                ->description('Currently published')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
