<?php

use LaravelEnso\TutorialManager\app\Models\Tutorial;

$factory->define(Tutorial::class, function (Faker\Generator $faker) {
    return [
            'permission_id' => null,
            'element' => $faker->word,
            'title' => $faker->word,
            'content' => $faker->sentence,
            'placement' => '1',
            'order' => '1',
            '_method' => 'POST',
    ];
});
