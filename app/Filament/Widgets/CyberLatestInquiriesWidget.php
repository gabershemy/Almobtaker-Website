<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Widgets\Widget;

class CyberLatestInquiriesWidget extends Widget
{
    protected string $view = 'filament.widgets.cyber-latest-inquiries';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function getViewData(): array
    {
        return [
            'latestInquiries' => Inquiry::latest()->take(5)->get(),
        ];
    }
}
