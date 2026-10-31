<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
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
                            TextInput::make('name')->label('الاسم الكامل')->required(),
                            TextInput::make('role')->label('المسمى الوظيفي / الدور')->required(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('specialty')->label('التخصص الدقيق')->placeholder('مثال: هندسة النظم السحابية'),
                            TextInput::make('order_num')->label('ترتيب الظهور')->numeric()->default(0),
                        ]),
                        TextInput::make('image_url')->label('رابط الصورة الحقيقية')->placeholder('/uploads/... أو رابط خارجي'),
                        Textarea::make('bio')->label('نبذة عن الخبرات والإنجازات')->rows(3),
                        Grid::make(3)->schema([
                            TextInput::make('linkedin')->label('رابط LinkedIn'),
                            TextInput::make('github')->label('رابط GitHub'),
                            TextInput::make('email')->label('البريد الإلكتروني')->email(),
                        ]),
                    ]),
            ]);
    }
}
