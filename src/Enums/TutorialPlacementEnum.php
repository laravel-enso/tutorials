<?php

namespace LaravelEnso\TutorialManager\Enums;

use LaravelEnso\Helpers\Classes\AbstractEnum;

class TutorialPlacementEnum extends AbstractEnum
{

    public function __construct()
	{
		$this->data = [

	        'top'    => __('top'),
	        'bottom' => __('bottom'),
	        'right'  => __('right'),
	        'left'   => __('left'),
	    ];
	}
}
