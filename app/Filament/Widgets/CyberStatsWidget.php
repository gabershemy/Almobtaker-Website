<?php

namespace App\Filament\Widgets;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use Filament\Widgets\Widget;

class CyberStatsWidget extends Widget
{
    protected string $view = 'filament.widgets.cyber-stats';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function getViewData(): array
    {
        $unreadInquiries = Inquiry::where('is_read', false)->count();
        $totalInquiries = Inquiry::count();

        return [
            'projectsCount' => Project::count(),
            'servicesCount' => Service::count(),
            'galleryCount'  => Gallery::count(),
            'teamCount'     => Team::count(),
            'faqsCount'     => Faq::count(),
            'inquiriesCount' => $totalInquiries,
            'unreadInquiries' => $unreadInquiries,
        ];
    }
}
