<?php

namespace LaravelEnso\Tutorials\Enums;

use LaravelEnso\Enums\Traits\Random;

enum Placement: int
{
    use Random;

    case Top = 1;
    case Bottom = 2;
    case Right = 3;
    case Left = 4;
}
