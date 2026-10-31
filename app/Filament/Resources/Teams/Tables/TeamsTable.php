<?php

namespace App\Filament\Resources\Teams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('#'),
                ImageColumn::make('image')->label('الصورة')->circular()->defaultImageUrl(fn () => '/logo.jpg'),
                TextColumn::make('name')->label('اسم العضو')->searchable()->weight('bold'),
                TextColumn::make('role')->label('المسمى الوظيفي')->badge()->color('info'),
                TextColumn::make('icon')->label('فئة الأيقونة')->fontFamily('mono'),
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
