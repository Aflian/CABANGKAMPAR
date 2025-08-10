<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Komisariat;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalKader = User::count();
        $totalKomsat = Komisariat::count();
        return [
            Stat::make('Data Kader', $totalKader)
            ->description('Total Kader Kampar')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
             Stat::make('Data Komisariat', $totalKomsat)
            ->description('Total Komisariat Kampar')
            ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Data Prestasi', '3:12')
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
