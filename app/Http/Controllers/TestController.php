<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB; // クエリビルダ用ファサード

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all(); // eroquant

        $tests = DB::table('tests')
            ->select('id')
            ->get(); // query builder

        dd($tests);

        return view('tests.test', ['values' => $values]);
        // return view('tests.test', compact('values')); //これでも良い
    }
}
