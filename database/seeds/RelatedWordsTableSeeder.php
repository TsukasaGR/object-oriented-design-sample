<?php

use Illuminate\Database\Seeder;

class RelatedWordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RelatedWord::truncate();

        factory(App\RelatedWord::class, 'sample1', 34)->create();
        factory(App\RelatedWord::class, 'sample2', 12)->create();
        factory(App\RelatedWord::class, 'sample3', 5)->create();
    }
}
