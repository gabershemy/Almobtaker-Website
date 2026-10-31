<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('إعدادات وبيانات الموقع العامة')
                    ->description('تعديل أرقام الهواتف، العناوين، ونصوص الهوية')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columns(1)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('key_name')
                            ->label('اسم الإعداد أو المفتاح البرمجي')
                            ->disabled()
                            ->columnSpanFull(),

                        Textarea::make('key_value')
                            ->label('قيمة الإعداد الحالية')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('اكتب القيمة الجديدة هنا...'),
                    ]),
            ]);
    }
}
