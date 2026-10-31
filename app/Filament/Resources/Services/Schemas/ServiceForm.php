<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل الخدمة البرمجية')
                    ->description('إدارة باقات وخدمات المبتكر العربي التقنية')
                    ->icon('heroicon-o-wrench-screwdriver')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان الخدمة الرئيسي')
                            ->required()
                            ->columnSpan(1)
                            ->placeholder('مثال: هندسة البرمجيات والأنظمة السحابية'),

                        TextInput::make('tag')
                            ->label('وسم الخدمة (Badge)')
                            ->columnSpan(1)
                            ->placeholder('مثال: سحابي ومتكامل'),

                        TextInput::make('icon')
                            ->label('أيقونة الخدمة (FontAwesome Class)')
                            ->columnSpan(1)
                            ->placeholder('مثال: fa-solid fa-cloud-arrow-up'),

                        TextInput::make('order_num')
                            ->label('ترتيب الظهور في الموقع')
                            ->numeric()
                            ->default(0)
                            ->columnSpan(1),

                        TextInput::make('short_desc')
                            ->label('وصف سريع وموجز للخدمة')
                            ->columnSpanFull()
                            ->placeholder('نبذة سريعة تظهر تحت العنوان...'),

                        Textarea::make('desc')
                            ->label('الوصف والشرح المفصل للخدمة')
                            ->columnSpanFull()
                            ->rows(4)
                            ->placeholder('شرح كامل لمميزات وما تقدمه الخدمة للعملاء...'),

                        TextInput::make('points')
                            ->label('أهم النقاط والمزايا (مفصولة بـ •)')
                            ->columnSpanFull()
                            ->placeholder('قواعد بيانات مشفرة • لوحات تحكم متقدمة • نسخ احتياطي لحظي'),

                        TextInput::make('tech')
                            ->label('التقنيات المستخدمة في تقديم الخدمة')
                            ->columnSpanFull()
                            ->placeholder('Laravel • Vue.js • Docker • Redis • AWS'),
                    ]),

                Section::make('تهيئة محركات البحث (SEO)')
                    ->description('تحسين ظهور هذه الخدمة على محركات البحث')
                    ->icon('heroicon-o-globe-alt')
                    ->collapsible()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('service_slug')
                            ->label('رابط الخدمة (Slug)')
                            ->columnSpan(1),

                        TextInput::make('seo_title')
                            ->label('عنوان السيو (Meta Title)')
                            ->columnSpan(1),

                        Textarea::make('seo_desc')
                            ->label('وصف السيو (Meta Description)')
                            ->columnSpanFull()
                            ->rows(2),

                        TextInput::make('seo_keywords')
                            ->label('كلمات السيو المفتاحية')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
