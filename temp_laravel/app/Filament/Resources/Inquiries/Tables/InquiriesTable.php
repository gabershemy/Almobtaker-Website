<?php

namespace App\Filament\Resources\Inquiries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class InquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('#'),
                TextColumn::make('name')->label('اسم العميل')->searchable()->weight('bold'),
                TextColumn::make('phone')->label('الهاتف / واتساب')->searchable()->fontFamily('mono')->copyable(),
                TextColumn::make('email')->label('البريد الإلكتروني')->searchable()->fontFamily('mono'),
                TextColumn::make('service_type')->label('نوع الخدمة')->badge()->color('info'),
                IconColumn::make('is_read')
                    ->label('مقروءة')
                    ->boolean(),
                TextColumn::make('created_at')->label('تاريخ الإرسال')->dateTime('d/m/Y h:i A')->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                TernaryFilter::make('is_read')
                    ->label('حالة القراءة')
                    ->trueLabel('مقروءة فقط')
                    ->falseLabel('غير مقروءة (جديدة)'),
            ])
            ->recordActions([
                EditAction::make()->label('عرض / تعديل'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
