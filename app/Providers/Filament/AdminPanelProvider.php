<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path(env('FILAMENT_PATH', 'cp'))
            ->login()
            ->collapsibleNavigationGroups(false)
            ->sidebarCollapsibleOnDesktop()
            ->colors([
                'primary' => Color::Cyan,
                'gray' => Color::Slate,
            ])
            ->font('Cairo')
            ->defaultThemeMode(ThemeMode::Light)
            ->brandName('المبتكر العربي للبرمجيات')
            ->brandLogo(asset('logo.jpg'))
            ->brandLogoHeight('2.6rem')
            ->favicon('/logo.jpg')
            ->sidebarCollapsibleOnDesktop()
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn () => view('filament.cyber-head')
            )
            ->renderHook(
                PanelsRenderHook::GLOBAL_SEARCH_START,
                fn () => view('filament.topbar-live-site')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->pages([
                Dashboard::class,
            ])
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
