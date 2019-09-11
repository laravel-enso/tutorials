<?php

namespace LaravelEnso\Tutorials\app\Enums;

use LaravelEnso\Enums\app\Services\Enum;

class Placement extends Enum
{
    const Top = 1;
    const Bottom = 2;
    const Right = 3;
    const Left = 4;

    protected static function attributes()
    {
        return [
            self::Top => 'top',
            self:: Bottom => 'bottom',
            self:: Right => 'right',
            self:: Left => 'left',
        ];
    }
}
