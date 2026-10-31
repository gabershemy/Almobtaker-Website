<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل رسالة وطلب العميل')
                    ->description('بيانات التواصل والاستفسار الوارد من الموقع')
                    ->icon('heroicon-o-envelope')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('اسم العميل / الشركة')
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->columnSpan(1),

                        TextInput::make('phone')
                            ->label('رقم الهاتف / واتساب')
                            ->columnSpan(1),

                        TextInput::make('service_type')
                            ->label('الخدمة أو المنظومة المطلوبة')
                            ->columnSpan(1),

                        Textarea::make('message')
                            ->label('نص الرسالة أو تفاصيل المشروع المطلوب')
                            ->rows(6)
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_read')
                            ->label('تمت مراجعة الطلب والتواصل مع العميل')
                            ->default(false)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
