<?php

namespace LaravelEnso\Tutorials\Enums;

use LaravelEnso\Enums\Services\Enums\Select;

enum Placement: int 
{
    use Select as Options;

    case Top = 1;
    case Bottom = 2;
    case Right = 3;
    case Left = 4;
}
