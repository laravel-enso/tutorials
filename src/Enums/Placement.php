<?php

namespace LaravelEnso\Tutorials\Enums;

use LaravelEnso\Enums\Contracts\Select;
use LaravelEnso\Enums\Services\Enums\Select as Options;

enum Placement: int implements Select
{
    use Options;

    case Top = 1;
    case Bottom = 2;
    case Right = 3;
    case Left = 4;
}
