<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('#'),
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => $record->image ?: '/logo.jpg'),
                TextColumn::make('title')
                    ->label('اسم المنظومة / المشروع')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('category_name')
                    ->label('التصنيف')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('tech')
                    ->label('التقنيات')
                    ->limit(30)
                    ->color('gray'),
                TextColumn::make('status')
                    ->label('الحالة / المؤشر')
                    ->badge()
                    ->color('success'),
                TextColumn::make('order_num')
                    ->label('الترتيب')
                    ->sortable(),
            ])
            ->defaultSort('order_num', 'asc')
            ->filters([
                SelectFilter::make('category')
                    ->label('تصفية حسب التصنيف')
                    ->options([
                        'erp' => 'أنظمة ERP وشركات',
                        'medical' => 'طبي ومستشفيات',
                        'industrial' => 'صناعي وزراعي',
                        'edtech' => 'تعليم ومنصات EdTech',
                        'fintech' => 'تمويل وتقسيط وكاشير',
                        'ai' => 'ذكاء اصطناعي وواتساب',
                        'zatca' => 'ZATCA وفوترة إلكترونية',
                    ]),
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
