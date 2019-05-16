<?php

namespace LaravelEnso\Tutorials\app\Http\Resources;

use LaravelEnso\Tutorials\app\Enums\Placement;
use Illuminate\Http\Resources\Json\JsonResource;

class Tutorial extends JsonResource
{
    public function toArray($request)
    {
        return [
            'element' => $this->element,
            'popover' => [
                'title' => __($this->title),
                'description' => __($this->content),
                'position' => Placement::get($this->placement),
            ],
        ];
    }
}
