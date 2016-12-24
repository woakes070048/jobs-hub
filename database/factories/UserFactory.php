<?php

/*
|--------------------------------------------------------------------------
| User Factories
|--------------------------------------------------------------------------
*/

$factory->define(\JobApis\JobsHub\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail(),
        'details' => null,
        'api_key' => $faker->uuid(),
    ];
});
