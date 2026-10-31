<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CyberWelcomeWidget extends Widget
{
    protected string $view = 'filament.widgets.cyber-welcome';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;
}
