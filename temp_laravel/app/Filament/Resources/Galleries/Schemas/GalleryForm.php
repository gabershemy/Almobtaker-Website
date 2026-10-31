<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات شاشة المنظومة')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')->label('عنوان الشاشة')->required(),
                            TextInput::make('gallery_slug')->label('الرابط المميز (Slug)'),
                        ]),
                        Grid::make(3)->schema([
                            Select::make('category')
                                ->label('التصنيف')
                                ->required()
                                ->options([
                                    'erp' => 'أنظمة ERP وشركات',
                                    'medical' => 'طبي ومستشفيات',
                                    'industrial' => 'صناعي وزراعي',
                                    'edtech' => 'تعليم ومنصات EdTech',
                                    'fintech' => 'تمويل وتقسيط وكاشير',
                                    'ai' => 'ذكاء اصطناعي وواتساب',
                                    'zatca' => 'ZATCA وفوترة إلكترونية',
                                ]),
                            TextInput::make('category_name')->label('اسم التصنيف بالعربية')->required(),
                            TextInput::make('order_num')->label('الترتيب')->numeric()->default(0),
                        ]),
                        TextInput::make('image')->label('رابط صورة الشاشة')->required(),
                        Textarea::make('desc')->label('شرح تفاصيل الشاشة ومزاياها')->rows(3),
                        TextInput::make('tech')->label('التقنيات المستخدمة'),
                    ]),
            ]);
    }
}
