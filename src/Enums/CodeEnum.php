<?php

namespace Glorax\FilamentRedirect\Enums;

enum CodeEnum: int
{
    case PERMANENT  = 301;
    case REDIRECT   = 302;
    case TEMP       = 307;

    public function getTitle(): ?string 
    {
        return match ($this) {
            self::PERMANENT => 'permanent',
            self::REDIRECT => 'redirect',
            self::TEMP => 'temp',
            default => null
        };
    }
}