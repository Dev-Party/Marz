<?php

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

$factory->define(App\User::class, function ($faker) {
    return [
        'name'  => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Radio::class, function ($faker) {
	return [
		'state_id'      => 1,
		'city_id'       => rand(1, 49),
		'modulation_id' => rand(1, 3),
		'name'          => $faker->name,
		'frequency'     => rand(90, 200),
		'streaming'     => 'http://' . $faker->ipv4,
		'active'		=> 1
	];
});

$factory->define(App\Modulation::class, function ($faker) {
	return [
		'name' => $faker->randomElements($array = array ('AM','FM','AM/FM'))
	];
});

$factory->define(App\State::class, function ($faker) {
	return [
		'name' => $faker->state
	];
});

$factory->define(App\City::class, function ($faker) {
	return [
		'state_id' => 1,
		'name'     => $faker->city
	];
});