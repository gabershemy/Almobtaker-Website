<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات الصورة أو الشاشة')
                    ->description('إدارة معرض الشاشات والواجهات البرمجية')
                    ->icon('heroicon-o-photo')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('عنوان الصورة أو الشاشة')
                            ->required()
                            ->columnSpan(1)
                            ->placeholder('مثال: شاشة لوحة القيادة التفاعلية في نظام ERP'),

                        TextInput::make('gallery_slug')
                            ->label('الرابط المميز (Slug)')
                            ->columnSpan(1),

                        TextInput::make('category')
                            ->label('رمز التصنيف')
                            ->columnSpan(1)
                            ->placeholder('erp, medical, etc.'),

                        TextInput::make('category_name')
                            ->label('اسم التصنيف بالعربية')
                            ->columnSpan(1)
                            ->placeholder('مثال: أنظمة ERP وشركات'),

                        TextInput::make('image')
                            ->label('رابط الصورة')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('https://... أو مسار الملف في /uploads/'),

                        Textarea::make('desc')
                            ->label('وصف توضيحي للشاشة البرمجية')
                            ->columnSpanFull()
                            ->rows(3),

                        TextInput::make('tech')
                            ->label('التقنيات المستخدمة في هذه الواجهة')
                            ->columnSpan(1)
                            ->placeholder('Vue 3 • Tailwind CSS • Chart.js'),

                        TextInput::make('order_num')
                            ->label('ترتيب العرض')
                            ->numeric()
                            ->default(0)
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
