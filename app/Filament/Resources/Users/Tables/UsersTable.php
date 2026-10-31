<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('#'),
                TextColumn::make('name')->label('اسم المستخدم')->searchable()->weight('bold'),
                TextColumn::make('email')->label('البريد الإلكتروني')->searchable()->fontFamily('mono'),
                TextColumn::make('roles.name')->label('الأدوار والرتب')->badge()->color('info'),
                TextColumn::make('created_at')->label('تاريخ التسجيل')->dateTime('d/m/Y')->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
