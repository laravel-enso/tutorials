<?php

namespace LaravelEnso\TutorialManager\app\Enums;

use LaravelEnso\Helpers\Classes\AbstractEnum;

class TutorialPlacementEnum extends AbstractEnum
{
    public function __construct()
    {
        $this->data = [
            0 => __('top'),
            1 => __('bottom'),
            2 => __('right'),
            3 => __('left'),
        ];
    }
}
