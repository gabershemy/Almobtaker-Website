<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CyberLatestInquiriesWidget;
use App\Filament\Widgets\CyberStatsWidget;
use App\Filament\Widgets\CyberWelcomeWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'الرئيسية';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';

    public function getWidgets(): array
    {
        return [
            CyberWelcomeWidget::class,
            CyberStatsWidget::class,
            CyberLatestInquiriesWidget::class,
        ];
    }

    public function getColumns(): int | array
    {
        return 1;
    }
}
