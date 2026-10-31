<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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
                            TextInput::make('name')->label('اسم العضو')->required(),
                            TextInput::make('role')->label('المسمى الوظيفي والمسؤولية')->required(),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('icon')->label('فئة الأيقونة FontAwesome')->placeholder('fa-solid fa-user-tie'),
                            TextInput::make('image')->label('رابط الصورة الشخصية (اختياري)'),
                            TextInput::make('order_num')->label('ترتيب الظهور')->numeric()->default(0),
                        ]),
                    ]),
            ]);
    }
}
