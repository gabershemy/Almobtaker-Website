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
                Section::make('إعدادات وبيانات الموقع')
                    ->schema([
                        TextInput::make('key_name')->label('اسم الإعداد / المفتاح')->disabled(),
                        Textarea::make('key_value')->label('قيمة الإعداد')->rows(4)->required(),
                    ]),
            ]);
    }
}
