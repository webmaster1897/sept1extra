<?php

namespace App\Filament\Pages;
use App\Filament\Resources\Posts\Widgets\StatsOverviewWidget;


use Filament\Pages\Page;

class Dashboard extends Page
{


    protected string $view = 'filament.pages.dashboard';

    // Return the widgets you want to display on this custom page
    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
        ];
    }
}
