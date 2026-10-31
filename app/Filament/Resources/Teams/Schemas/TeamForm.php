<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات عضو الفريق')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->label('الاسم الكامل')->required(),
                            TextInput::make('role')->label('المسمى الوظيفي / الدور')->required(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('icon')->label('فئة الأيقونة FontAwesome')->placeholder('مثال: fa-solid fa-code'),
                            TextInput::make('order_num')->label('ترتيب الظهور')->numeric()->default(0),
                        ]),
                        TextInput::make('image')->label('رابط الصورة الحقيقية')->placeholder('/uploads/... أو رابط صورة'),
                    ]),
            ]);
    }
}
