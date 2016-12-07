<?php

/**
 * Users
 */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/**
 * Radios
 */
$factory->define(App\Radio::class, function (Faker\Generator $faker) {
	return [
		'state_id'      => 1,
		'city_id'       => rand(1, 49),
		'modulation_id' => rand(1, 2),
		'name'          => $faker->name,
		'frequency'     => rand(90, 200),
		'email'         => $faker->email,
		'phone'         => $faker->tollFreePhoneNumber,
		'address'       => $faker->address,
		'website'       => 'http://' . $faker->safeEmailDomain,
		'streaming'     => 'http://' . $faker->ipv4,
		'active'		=> 1
	];
});

/**
 * Modultationes
 */
$factory->define(App\Modulation::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->randomElements($array = array ('AM','FM'))
	];
});

/**
 * Estates
 */
$factory->define(App\State::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->state
	];
});

/**
 * Cities
 */
$factory->define(App\City::class, function (Faker\Generator $faker) {
	return [
		'state_id' => 1,
		'name'     => $faker->city
	];
});
