<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل الخدمة البرمجية')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('title')->label('عنوان الخدمة')->required(),
                            TextInput::make('tag')->label('وسم الخدمة')->placeholder('مثال: تطبيقات سحابية'),
                            TextInput::make('icon')->label('فئة الأيقونة FontAwesome')->placeholder('مثال: fa-solid fa-gears'),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('short_desc')->label('وصف سريع وموجز'),
                            TextInput::make('order_num')->label('الترتيب')->numeric()->default(0),
                        ]),
                        Textarea::make('desc')->label('الوصف الكامل للخدمة')->rows(4),
                        TextInput::make('points')->label('أهم النقاط والمزايا (مفصولة بـ •)'),
                        TextInput::make('tech')->label('التقنيات المستخدمة'),
                    ]),

                Section::make('تهيئة السيو (SEO)')
                    ->collapsible()
                    ->schema([
                        TextInput::make('service_slug')->label('رابط الخدمة (Slug)'),
                        TextInput::make('seo_title')->label('عنوان السيو'),
                        Textarea::make('seo_desc')->label('وصف السيو')->rows(2),
                        TextInput::make('seo_keywords')->label('كلمات السيو المفتاحية'),
                    ]),
            ]);
    }
}
