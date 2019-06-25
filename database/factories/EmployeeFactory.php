<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'companyID' => factory('App\Company')->lazy(),
        'firstName' => $faker->firstName(),
        'lastName'  => $faker->lastName,
        'phone'      => $faker->phoneNumber,
        'email'      => $faker->unique()->safeEmail,
    ];
});
