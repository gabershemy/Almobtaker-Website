<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات الحساب والصلاحيات')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->label('الاسم الكامل')->required(),
                            TextInput::make('email')->label('البريد الإلكتروني')->email()->required()->unique(ignoreRecord: true),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('password')
                                ->label('كلمة المرور')
                                ->password()
                                ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : null)
                                ->dehydrated(fn ($state) => filled($state))
                                ->required(fn (string $context): bool => $context === 'create'),
                            Select::make('roles')
                                ->label('الأدوار والرتب (الصلاحيات)')
                                ->relationship('roles', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable(),
                        ]),
                    ]),
            ]);
    }
}
