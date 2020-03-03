<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cert;
use App\User;
use Faker\Generator as Faker;

$factory->define(Cert::class, function (Faker $faker) {
    return [
        //
        'cert_num'=> 'C'.rand(10000000,50000000),
        'name'=> $faker->name,
        'date_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'ic_ibu'=>factory(User::class)->create()->ic_number,
        'ic_bapa'=>factory(User::class)->create()->ic_number,
    ];
});
