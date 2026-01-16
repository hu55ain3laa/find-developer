<?php

namespace App\Filament\Customs;

use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;

class ExpectedSalaryToField
{
    public static function make(string $name = 'expected_salary_to'): TextInput
    {
        return TextInput::make($name)
            ->mask(RawJs::make('$money($input)'))
            ->stripCharacters(',')
            ->label('Expected Salary To')
            ->gt('expected_salary_from')
            ->regex('/^\d+$/')
            ->minValue(0);
    }
}
