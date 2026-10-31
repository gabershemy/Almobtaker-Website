<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_name')->label('الإعداد / المتغير')->badge()->color('info')->sortable(),
                TextColumn::make('key_value')->label('القيمة الحالية')->limit(60)->wrap(),
                TextColumn::make('updated_at')->label('آخر تحديث')->dateTime()->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
