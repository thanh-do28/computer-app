<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        $new_products = DB::table('tbl_products')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(6)->get();


        return view('front.content.page.show_content')->with('cate_products', $cate_products)->with('brand_products', $brand_products)->with('new_products', $new_products);
    }
}
