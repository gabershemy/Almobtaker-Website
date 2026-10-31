<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('السؤال والإجابة الشائعة')
                    ->description('إدارة الأسئلة الأكثر شيوعاً لتسهيل وصول العملاء للإجابات')
                    ->icon('heroicon-o-question-mark-circle')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('question')
                            ->label('نص السؤال الشائع')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('مثال: هل يمكن ربط برنامج المبتكر مع الفوترة الإلكترونية ZATCA؟'),

                        Textarea::make('answer')
                            ->label('الإجابة الوافية والتفصيلية')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull()
                            ->placeholder('اكتب إجابة واضحة تبرز خبرات وإمكانيات الشركة...'),

                        TextInput::make('category')
                            ->label('التصنيف أو الفئة')
                            ->columnSpan(1)
                            ->placeholder('عام, فني, تكاملات, تعاقدات'),

                        TextInput::make('order_num')
                            ->label('ترتيب الظهور في الموقع')
                            ->numeric()
                            ->default(0)
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
