<?php

namespace App\Http\Models;

use App\RelatedWord;

class AggregatedRelatedWord
{
    /** @var int $keyword_id */
    public $keyword_id;
    /** @var string $body */
    public $body;
    /** @var string $form */
    public $form;
    /** @var int $count */
    public $count;
    /** @var float $ratio */
    public $ratio;

    /**
     * KeywordWithRelatedWord constructor.
     * @param int $keyword_id
     * @param string $body
     * @param string $form
     */
    public function __construct(int $keyword_id, string $body, string $form)
    {
        $this->keyword_id = $keyword_id;
        $this->body = $body;
        $this->form = $form;
        $this->setCount();
    }

    /**
     * 出現回数をセットする
     */
    private function setCount()
    {
        $this->count = RelatedWord::where('keyword_id', $this->keyword_id)
            ->where('body', $this->body)
            ->where('form', $this->form)
            ->count();
    }

    /**
     * 合計件数より出現率をセットする
     * @param int $count_sum
     */
    public function setRatio(int $count_sum)
    {
        $this->ratio = round($this->count / $count_sum * 100, 2);
    }
}