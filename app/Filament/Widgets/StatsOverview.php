<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\User;
use App\Models\Komisariat;
use App\Models\RekapKader;
use App\Models\PrestasiKader;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalKader = User::count();
        $totalKomsat = Komisariat::count();
        $totalPost = Post::count();
        $totalPrestasi = PrestasiKader::count();
        $totalKader = RekapKader::count();
        return [
            Stat::make('Data Kader', $totalKader)
            ->description('Total Kader Kampar'),
             Stat::make('Data Komisariat', $totalKomsat)
            ->description('Total Komisariat Kampar'),
            Stat::make('Data Post', $totalPost)
            ->description('Total Post dan Berita'),
            Stat::make('Data Prestasi', $totalPrestasi)
            ->description('Total Prestasi Kader'),
            Stat::make('Data Kegiatan Kader', $totalKader)
            ->description('Total Kegiatan Kader'),
        ];
    }
}
