<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum UserType: string implements HasLabel, HasColor, HasIcon
{
    case DEVELOPER = 'developer';
    case ADMIN = 'admin';
    case CLIENT = 'client';

    public function getLabel(): string
    {
        return match ($this) {
            self::DEVELOPER => 'Developer',
            self::ADMIN => 'Admin',
            self::CLIENT => 'Client',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::DEVELOPER => 'info',
            self::ADMIN => 'danger',
            self::CLIENT => 'success',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::DEVELOPER => 'heroicon-o-code-bracket',
            self::ADMIN => 'heroicon-o-shield-check',
            self::CLIENT => 'heroicon-o-user',
        };
    }
}
