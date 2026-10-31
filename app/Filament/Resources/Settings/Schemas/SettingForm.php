<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تعديل إعدادات وبيانات الموقع')
                    ->schema([
                        TextInput::make('key_name')
                            ->label('مفتاح الإعداد (Key)')
                            ->disabled()
                            ->required(),
                        Textarea::make('key_value')
                            ->label('القيمة النصية للإعداد')
                            ->rows(4)
                            ->required(),
                    ]),
            ]);
    }
}
