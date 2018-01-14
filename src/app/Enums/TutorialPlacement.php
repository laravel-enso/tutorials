<?php

namespace LaravelEnso\TutorialManager\app\Enums;

use LaravelEnso\Helpers\app\Classes\Enum;

class TutorialPlacement extends Enum
{
    protected static $data = [
        0 => 'top',
        1 => 'bottom',
        2 => 'right',
        3 => 'left',
    ];
}
