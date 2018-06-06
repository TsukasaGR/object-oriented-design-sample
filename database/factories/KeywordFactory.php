<?php

use Faker\Generator as Faker;

$factory->define(App\Keyword::class, function (Faker $faker) {
    return [
        'body' => '夏',
        'form' => '名詞'
    ];
});
