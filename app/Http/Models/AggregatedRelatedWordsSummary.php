<?php

namespace App\Http\Models;

use App\Keyword;
use App\RelatedWord;
use Illuminate\Database\Eloquent\Collection;

class AggregatedRelatedWordsSummary
{
    /** @var int */
    public $keyword_id;
    /** @var Collection */
    public $related_words;

    /**
     * KeywordWithRelatedWordsSummary constructor.
     * @param Keyword $keyword
     */
    public function __construct(int $keyword_id)
    {
        $this->keyword_id = $keyword_id;
        $this->setAggregatedRelatedWordSummary();
        if ($this->related_words) {
            $this->calcRatioAndRanking();
        }
    }

    /**
     * 重複排除した関連ワード一覧を取得する
     * @return RelatedWord
     */
    private function getDistinctRelatedWords()
    {
        return RelatedWord::where('keyword_id', $this->keyword_id)->select('body', 'form')->distinct()->get();
    }

    /**
     * 集計結果をセットする
     */
    private function setAggregatedRelatedWordSummary()
    {
        $distinct_related_words = $this->getDistinctRelatedWords();

        $this->related_words = new Collection();
        foreach ($distinct_related_words as $related_word) {
            $this->related_words->push(new AggregatedRelatedWord($this->keyword_id, $related_word->body, $related_word->form));
        }
    }

    /**
     * 集計結果のサマリーに対して、出現率とランキングを計算する
     */
    private function calcRatioAndRanking()
    {
        // ratio用に総合計件数を取得
        $count_sum = $this->related_words->sum('count');

        // 出現回数の多い順に並び替え
        $this->related_words = $this->related_words->sortByDesc('count');

        // 出現率を算出
        /** @var AggregatedRelatedWord $related_word */
        foreach ($this->related_words as $related_word) {
            $related_word->setRatio($count_sum);
        }
    }
}