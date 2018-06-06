<?php

use Faker\Generator as Faker;

$factory->define(App\RelatedWord::class, function (Faker $faker) {
    $keyword_id = \App\Keyword::first();
    return [
        'keyword_id' => $keyword_id->id,
        'body' => '暑い',
        'form' => '形容詞'
    ];
}, 'sample1');

$factory->define(App\RelatedWord::class, function (Faker $faker) {
    $keyword_id = \App\Keyword::first();
    return [
        'keyword_id' => $keyword_id->id,
        'body' => '風鈴',
        'form' => '名詞'
    ];
}, 'sample2');

$factory->define(App\RelatedWord::class, function (Faker $faker) {
    $keyword_id = \App\Keyword::first();
    return [
        'keyword_id' => $keyword_id->id,
        'body' => '泳ぐ',
        'form' => '動詞'
    ];
}, 'sample3');
