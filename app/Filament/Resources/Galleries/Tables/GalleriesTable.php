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
                ImageColumn::make('image_url')->label('المعاينة')->square(),
                TextColumn::make('title')->label('العنوان')->searchable()->weight('bold'),
                TextColumn::make('category')->label('التصنيف')->badge()->color('info'),
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
