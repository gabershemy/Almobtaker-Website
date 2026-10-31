<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل رسالة العميل')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->label('اسم العميل')->required(),
                            TextInput::make('email')->label('البريد الإلكتروني')->email(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('phone')->label('رقم الهاتف / واتساب'),
                            TextInput::make('service_type')->label('الخدمة المطلوبة'),
                        ]),
                        Textarea::make('message')->label('نص الرسالة')->rows(5)->required(),
                        Toggle::make('is_read')
                            ->label('تمت القراءة والمتابعة')
                            ->default(false),
                    ]),
            ]);
    }
}
