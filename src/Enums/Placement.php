<?php

namespace LaravelEnso\Tutorials\Enums;

use LaravelEnso\Enums\Traits\Enum;

enum Placement: int
{
    use Enum;

    case Top = 1;
    case Bottom = 2;
    case Right = 3;
    case Left = 4;
}
