<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kategori;
use Faker\Generator as Faker;

$factory->define(Kategori::class, function (Faker $faker) {
    return [
        //
        'jenis_kategori' => $faker->person,
        'nama_kategori' => $faker->person,
    ];
});
