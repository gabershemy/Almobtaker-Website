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
                Section::make('السؤال والإجابة الشائعة')
                    ->schema([
                        TextInput::make('question')->label('السؤال')->required(),
                        Textarea::make('answer')->label('الإجابة الشافية والتفصيلية')->required()->rows(4),
                        Grid::make(2)->schema([
                            TextInput::make('category')->label('التصنيف')->placeholder('عام, فني, تعاقدات'),
                            TextInput::make('order_num')->label('ترتيب الظهور')->numeric()->default(0),
                        ]),
                    ]),
            ]);
    }
}
