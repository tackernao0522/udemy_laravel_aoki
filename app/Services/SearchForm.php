<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchForm
{
  public static function checkSearch($search)
  {
    // 検索フォーム
    $query = DB::table('contact_forms');

    //もしキーワードがあったら
    if ($search !== null) {
      //全角スペースを半角に
      $search_split = mb_convert_kana($search, 's');

      //空白で区切る
      $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

      //単語をループで回す
      foreach ($search_split2 as $value) {
        $query->where('your_name', 'like', '%' . $value . '%');
      }
    };

    $query->select('id', 'your_name', 'title', 'created_at');
    $query->orderBy('created_at', 'asc');
    return $query;
  }
}
