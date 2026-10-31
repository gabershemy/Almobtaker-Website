<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات الصورة أو الشاشة')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')->label('عنوان الصورة')->required(),
                            TextInput::make('gallery_slug')->label('الرابط المميز (Slug)'),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('category')->label('رمز التصنيف')->placeholder('erp, medical, etc.'),
                            TextInput::make('category_name')->label('اسم التصنيف بالعربية'),
                        ]),
                        TextInput::make('image')->label('رابط الصورة')->required()->placeholder('https://... أو مسار الملف'),
                        Textarea::make('desc')->label('وصف توضيحي للشاشة')->rows(3),
                        Grid::make(2)->schema([
                            TextInput::make('tech')->label('التقنيات المستخدمة'),
                            TextInput::make('order_num')->label('ترتيب العرض')->numeric()->default(0),
                        ]),
                    ]),
            ]);
    }
}
