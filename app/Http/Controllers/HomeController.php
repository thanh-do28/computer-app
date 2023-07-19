<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        $new_products = DB::table('tbl_products')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(4)->get();
        $related_products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();
        $array = (array)$related_products;
        $array1 = array_chunk($array, 1);
        $related_product = array_chunk($array1[0][0], 4);

        return view('front.content.page.show_content')
            ->with('cate_products', $cate_products)
            ->with('brand_products', $brand_products)
            ->with('new_products', $new_products)
            ->with('related_product', $related_product);
    }
}
