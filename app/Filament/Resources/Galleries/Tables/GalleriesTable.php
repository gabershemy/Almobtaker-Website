<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('#'),
                ImageColumn::make('image')->label('الشاشة')->circular(),
                TextColumn::make('title')->label('عنوان الشاشة')->searchable()->weight('bold'),
                TextColumn::make('category_name')->label('القسم')->badge(),
                TextColumn::make('tech')->label('التقنيات')->limit(25),
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
