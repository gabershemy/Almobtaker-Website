<?php

namespace App\Filament\Resources\Faqs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('#'),
                TextColumn::make('question')->label('السؤال')->searchable()->weight('bold')->wrap(),
                TextColumn::make('category')->label('التصنيف')->badge()->color('info'),
                TextColumn::make('answer')->label('الإجابة')->limit(60),
                TextColumn::make('order_num')->label('الترتيب')->sortable(),
            ])
            ->defaultSort('order_num', 'asc')
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
