<?php

namespace Glorax\FilamentRedirect\Enums;

use Illuminate\Support\Arr;

enum CodeEnum: int
{
    case PERMANENT  = 301;
    case REDIRECT   = 302;
    case TEMP       = 307;

    public static function getDefaultCode(): int
    {
        return static::PERMANENT->value;
    }

    public function getTitle(): ?string 
    {
        return match ($this) {
            self::PERMANENT => 'permanent',
            self::REDIRECT => 'redirect',
            self::TEMP => 'temp',
            default => null
        };
    }

    public static function getArray(): array
    {
        $result = [];
        Arr::map(self::cases(), function (self $code) use (&$result) {
            $result[$code->value] = $code->getTitle();
        });
        return $result;
    }
}