<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات المشروع والمنظومة')
                    ->description('أدخل التفاصيل والبيانات الأساسية للمشروع لعرضه في البورتفوليو')
                    ->icon('heroicon-o-briefcase')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('اسم المنظومة أو المشروع')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('مثال: منظومة المبتكر ERP السحابية المتكاملة للشركات'),

                        TextInput::make('project_slug')
                            ->label('الرابط المميز (Slug)')
                            ->placeholder('مثال: almobtaker-erp')
                            ->columnSpan(1),

                        TextInput::make('order_num')
                            ->label('ترتيب الظهور في الموقع')
                            ->numeric()
                            ->default(0)
                            ->columnSpan(1),

                        Select::make('category')
                            ->label('نوع التصنيف الرئيسي')
                            ->required()
                            ->columnSpan(1)
                            ->options([
                                'erp' => 'أنظمة ERP وشركات',
                                'medical' => 'طبي ومستشفيات',
                                'industrial' => 'صناعي وزراعي',
                                'edtech' => 'تعليم ومنصات EdTech',
                                'fintech' => 'تمويل وتقسيط وكاشير',
                                'ai' => 'ذكاء اصطناعي وواتساب',
                                'zatca' => 'ZATCA وفوترة إلكترونية',
                            ]),

                        TextInput::make('category_name')
                            ->label('اسم التصنيف بالعربية (العنوان التوضيحي)')
                            ->required()
                            ->columnSpan(1)
                            ->placeholder('مثال: أنظمة ERP وشركات'),

                        TextInput::make('tech')
                            ->label('التقنيات المستخدمة (Tech Stack)')
                            ->columnSpanFull()
                            ->placeholder('مثال: Laravel 11 • Vue.js • MySQL • Multi-Tenancy'),

                        TextInput::make('status')
                            ->label('الحالة / المؤشر الإحصائي')
                            ->columnSpanFull()
                            ->placeholder('مثال: يعمل لدى 35+ شركة ومؤسسة'),

                        Textarea::make('description')
                            ->label('الوصف المختصر للمنظومة (المقدمة السريعة)')
                            ->columnSpanFull()
                            ->rows(3)
                            ->placeholder('وصف موجز يظهر في كروت المعرض وسلايدر المشاريع...'),

                        Textarea::make('full_desc')
                            ->label('الشرح والتحليل الهندسي الكامل للبرنامج')
                            ->columnSpanFull()
                            ->rows(5)
                            ->placeholder('تفاصيل هندسية ومميزات موسعة للمشروع...'),
                    ]),

                Section::make('الوسائط والصور')
                    ->description('روابط صور العرض والشاشات')
                    ->icon('heroicon-o-photo')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('image')
                            ->label('رابط الصورة الرئيسية (صورة البطاقة/الكارت)')
                            ->columnSpan(1)
                            ->placeholder('https://... أو /uploads/...'),

                        TextInput::make('hero_image')
                            ->label('رابط صورة الغلاف أو البانر التفاعلي')
                            ->columnSpan(1)
                            ->placeholder('https://... أو /uploads/...'),

                        Textarea::make('screenshots')
                            ->label('روابط لقطات الشاشة الإضافية (JSON Array أو روابط مفصولة بأسطر)')
                            ->columnSpanFull()
                            ->rows(3)
                            ->placeholder('["https://...", "https://..."]'),
                    ]),

                Section::make('تهيئة محركات البحث وتصدر جوجل (SEO)')
                    ->description('الكلمات المفتاحية وعناوين الميتا لتحسين الظهور في نتائج البحث')
                    ->icon('heroicon-o-magnifying-glass')
                    ->collapsible()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('عنوان السيو (Meta Title)')
                            ->columnSpanFull()
                            ->placeholder('عنوان جذاب لمحركات البحث...'),

                        Textarea::make('seo_desc')
                            ->label('وصف السيو (Meta Description)')
                            ->columnSpanFull()
                            ->rows(2)
                            ->placeholder('وصف لا يتجاوز 160 حرفاً يظهر تحت رابط الموقع في نتائج بحث جوجل...'),

                        TextInput::make('seo_keywords')
                            ->label('الكلمات المفتاحية (Meta Keywords)')
                            ->columnSpanFull()
                            ->placeholder('برامج شركات, محاسبة سحابية, أنظمة مستشفيات...'),
                    ]),
            ]);
    }
}
