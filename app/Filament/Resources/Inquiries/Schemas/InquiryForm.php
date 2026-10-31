<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل طلب عرض السعر / الرسالة الواردة')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('name')->label('اسم العميل')->required(),
                            TextInput::make('phone')->label('رقم الهاتف / واتساب')->required(),
                            TextInput::make('email')->label('البريد الإلكتروني'),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('service_type')->label('نوع الخدمة أو المنظومة المطلوبة'),
                            Toggle::make('is_read')->label('تمت مراجعة الطلب (مقروء)')->default(true),
                        ]),
                        Textarea::make('message')->label('تفاصيل الفكرة أو المتطلبات')->rows(5),
                    ]),
            ]);
    }
}
