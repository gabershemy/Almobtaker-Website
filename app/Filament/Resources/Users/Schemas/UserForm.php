<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('بيانات المستخدم والحساب الإداري')
                    ->description('إدارة بيانات الدخول والصلاحيات الإدارية')
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('اسم المستخدم')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1)
                            ->placeholder('مثال: د. جابر الشيمي'),

                        TextInput::make('email')
                            ->label('البريد الإلكتروني للوصول')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->columnSpan(1)
                            ->placeholder('admin@mobtakeraraby.com'),

                        TextInput::make('password')
                            ->label('كلمة المرور الجديدة')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->maxLength(255)
                            ->columnSpan(1)
                            ->placeholder('اتركها فارغة إذا لم ترغب بتغييرها'),

                        Select::make('roles')
                            ->label('الأدوار والصلاحيات (Role)')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
