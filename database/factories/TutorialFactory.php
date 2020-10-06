<?php

namespace LaravelEnso\Tutorials\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tutorials\Enums\Placement;
use LaravelEnso\Tutorials\Models\Tutorial;

class TutorialFactory extends Factory
{
    protected $model = Tutorial::class;

    public function definition()
    {
        return [
            'permission_id' => Permission::factory(),
            'element' => $this->faker->word,
            'title' => $this->faker->word,
            'content' => $this->faker->sentence,
            'placement' => Placement::keys()->random(),
            'order_index' => $this->faker->randomNumber(2),
        ];
    }
}
