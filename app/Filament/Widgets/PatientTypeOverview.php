<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Gatos', Patient::query()->where('type', 'cat')->count()),
            Stat::make('Perros', Patient::query()->where('type', 'dog')->count()),
            Stat::make('Conejos', Patient::query()->where('type', 'rabbit')->count()),
        ];
    }
}
