<?php

namespace LaravelEnso\Tutorials\App\Enums;

use LaravelEnso\Enums\App\Services\Enum;

class Placement extends Enum
{
    public const Top = 1;
    public const Bottom = 2;
    public const Right = 3;
    public const Left = 4;

    protected static function data(): array
    {
        return [
            self::Top => 'top',
            self::Bottom => 'bottom',
            self::Right => 'right',
            self::Left => 'left',
        ];
    }
}
