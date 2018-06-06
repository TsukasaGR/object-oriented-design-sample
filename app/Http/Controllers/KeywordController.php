<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\Http\Models\AggregatedRelatedWordsSummary;

class KeywordController extends Controller
{
    public function index()
    {
        // 任意のキーワードを1つ抽出
        $keyword = Keyword::first();

        // 集計したオブジェクトを画面表示
        dd(new AggregatedRelatedWordsSummary($keyword->id));
    }
}
