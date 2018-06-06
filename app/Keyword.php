<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $guarded = ['id'];

    public function relatedWords()
    {
        return $this->hasMany(\App\RelatedWord::class);
    }
}
