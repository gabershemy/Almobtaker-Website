<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات عضو الفريق والخبراء')
                    ->description('إدارة أعضاء الفريق والكفاءات التقنية')
                    ->icon('heroicon-o-user-group')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('الاسم الكامل')
                            ->required()
                            ->columnSpan(1)
                            ->placeholder('مثال: د. جابر الشيمي'),

                        TextInput::make('role')
                            ->label('المسمى الوظيفي / الدور التقني')
                            ->required()
                            ->columnSpan(1)
                            ->placeholder('مثال: المؤسس والمدير التنفيذي • مهندس برمجيات أول'),

                        TextInput::make('icon')
                            ->label('رمز الأيقونة (FontAwesome)')
                            ->columnSpan(1)
                            ->placeholder('مثال: fa-solid fa-code'),

                        TextInput::make('order_num')
                            ->label('ترتيب الظهور')
                            ->numeric()
                            ->default(0)
                            ->columnSpan(1),

                        TextInput::make('image')
                            ->label('رابط الصورة الشخصية')
                            ->columnSpanFull()
                            ->placeholder('https://... أو /uploads/...'),
                    ]),
            ]);
    }
}
