<?php

namespace LaravelEnso\Tutorials\Http\Resources;

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
                'position' => $this->placement->name,
            ],
        ];
    }
}
