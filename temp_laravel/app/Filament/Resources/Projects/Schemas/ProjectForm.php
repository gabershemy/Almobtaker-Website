<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('البيانات الأساسية للمشروع')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('اسم المنظومة أو المشروع')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('project_slug')
                                ->label('الرابط المميز (Slug)')
                                ->placeholder('مثال: almobtaker-erp'),
                        ]),
                        Grid::make(3)->schema([
                            Select::make('category')
                                ->label('نوع التصنيف')
                                ->required()
                                ->options([
                                    'erp' => 'أنظمة ERP وشركات',
                                    'medical' => 'طبي ومستشفيات',
                                    'industrial' => 'صناعي وزراعي',
                                    'edtech' => 'تعليم ومنصات EdTech',
                                    'fintech' => 'تمويل وتقسيط وكاشير',
                                    'ai' => 'ذكاء اصطناعي وواتساب',
                                    'zatca' => 'ZATCA وفوترة إلكترونية',
                                ])
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $map = [
                                        'erp' => 'أنظمة ERP وشركات',
                                        'medical' => 'طبي ومستشفيات',
                                        'industrial' => 'صناعي وزراعي',
                                        'edtech' => 'تعليم ومنصات EdTech',
                                        'fintech' => 'تمويل وتقسيط وكاشير',
                                        'ai' => 'ذكاء اصطناعي وواتساب',
                                        'zatca' => 'ZATCA وفوترة إلكترونية',
                                    ];
                                    if (isset($map[$state])) {
                                        $set('category_name', $map[$state]);
                                    }
                                }),
                            TextInput::make('category_name')
                                ->label('اسم التصنيف بالعربية')
                                ->required(),
                            TextInput::make('order_num')
                                ->label('ترتيب الظهور')
                                ->numeric()
                                ->default(0),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('tech')
                                ->label('التقنيات المستخدمة (Tech Stack)')
                                ->placeholder('مثال: Laravel 11 • Vue.js • MySQL'),
                            TextInput::make('status')
                                ->label('الحالة / الإحصائية')
                                ->placeholder('مثال: يعمل لدى 35+ شركة ومؤسسة'),
                        ]),
                        Textarea::make('description')
                            ->label('الوصف المختصر للمنظومة')
                            ->rows(3),
                        Textarea::make('full_desc')
                            ->label('الشرح والتحليل الهندسي الكامل')
                            ->rows(5),
                    ]),

                Section::make('الوسائط والصور')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('image')
                                ->label('رابط الصورة الرئيسية')
                                ->placeholder('https://... أو اسم الملف'),
                            TextInput::make('hero_image')
                                ->label('رابط صورة الغلاف أو الهيدر')
                                ->placeholder('https://... أو اسم الملف'),
                        ]),
                    ]),

                Section::make('تهيئة محركات البحث (SEO)')
                    ->collapsible()
                    ->schema([
                        TextInput::make('seo_title')->label('عنوان السيو (Meta Title)'),
                        Textarea::make('seo_desc')->label('وصف السيو (Meta Description)')->rows(2),
                        TextInput::make('seo_keywords')->label('الكلمات المفتاحية (Meta Keywords)'),
                    ]),
            ]);
    }
}
