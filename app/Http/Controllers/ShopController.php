<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;

class ShopController extends Controller
{
    public function index()
    {
        // 主 -> 従 eloquent
        $area_tokyo = Area::find(1)->shops;
        // dd($area_tokyo);

        // 主 <- 従 eloquent
        $shop = Shop::find(2)->area->name;

        // 多 : 多
        $shop_route = Shop::find(1)->routes()->get();

        dd($area_tokyo, $shop, $shop_route);
    }
}
