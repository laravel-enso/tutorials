<?php

use LaravelEnso\TutorialManager\app\Models\Tutorial;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tutorial::class, function (Faker\Generator $faker) {
    return [
            'permission_id' => null,
            'element'       => $faker->word,
            'title'         => $faker->word,
            'content'       => $faker->sentence,
            'placement'     => '1',
            'order'         => '1',
            '_method'       => 'POST',
    ];
});
