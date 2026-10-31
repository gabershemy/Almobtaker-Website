<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                            TextInput::make('category')->label('التصنيف')->placeholder('مثال: erp, mobile, medical'),
                        ]),
                        TextInput::make('image_url')->label('رابط الصورة')->required()->placeholder('https://... أو مسار الملف'),
                        Textarea::make('description')->label('وصف توضيحي للشاشة')->rows(3),
                        TextInput::make('order_num')->label('ترتيب العرض')->numeric()->default(0),
                    ]),
            ]);
    }
}
