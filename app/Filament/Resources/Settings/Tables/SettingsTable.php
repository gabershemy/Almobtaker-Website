<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_name')
                    ->label('اسم الإعداد / المفتاح')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            'site_title' => 'عنوان الموقع الرئيسي',
                            'phone' => 'رقم الهاتف المباشر',
                            'whatsapp' => 'رقم الواتساب',
                            'email' => 'البريد الإلكتروني',
                            'facebook' => 'رابط صفحة فيسبوك',
                            'address' => 'مقر الشركة وعنوانها',
                            'work_hours' => 'ساعات وأيام العمل',
                            'hero_title' => 'العنوان الرئيسي للهيدر',
                            'hero_subtitle' => 'الوصف الترويجي أسفل الهيدر',
                            'hero_p1' => 'فقرة ترويجية إضافية',
                            'about_p1' => 'فقرة من نحن (1)',
                            'about_p2' => 'فقرة من نحن (2)',
                            'about_p3' => 'فقرة من نحن (3)',
                        ];
                        return ($labels[$state] ?? $state) . ' (' . $state . ')';
                    }),
                TextColumn::make('key_value')
                    ->label('القيمة الحالية')
                    ->limit(60)
                    ->wrap(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
