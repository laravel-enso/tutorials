<?php

namespace LaravelEnso\Tutorials\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LaravelEnso\Tutorials\Enums\Placement;

class Tutorial extends JsonResource
{
    public function toArray($request)
    {
        return [
            'element' => $this->element,
            'popover' => [
                'title' => __($this->title),
                'description' => __($this->content),
                'position' => Placement::from($this->placement)->name,
            ],
        ];
    }
}
