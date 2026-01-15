<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Skill Information')
                    ->description('Manage skill details')
                    ->schema([
                        Forms\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'create') {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        Forms\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from name'),

                        Forms\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive skills won\'t be available for selection'),
                    ])
                    ->columns(2),
            ]);
    }
}
