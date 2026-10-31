<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('السؤال الشائع والإجابة')
                    ->schema([
                        TextInput::make('question')->label('نص السؤال')->required(),
                        Grid::make(2)->schema([
                            TextInput::make('category')->label('التصنيف')->default('عام'),
                            TextInput::make('order_num')->label('ترتيب الظهور')->numeric()->default(0),
                        ]),
                        Textarea::make('answer')->label('الإجابة النموذجية التفصيلية')->rows(4)->required(),
                    ]),
            ]);
    }
}
