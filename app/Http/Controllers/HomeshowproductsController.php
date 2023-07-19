<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeshowproductsController extends Controller
{
    // category products show home

    public function show_category_home($id)
    {
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        $related_products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();
        $array = (array)$related_products;
        $array1 = array_chunk($array, 1);
        $related_product = array_chunk($array1[0][0], 4);

        $category_name = DB::table('tbl_category_products')->where('category_id', $id)->first();
        $all_category = DB::table('tbl_products')
            ->join('tbl_category_products', 'tbl_products.category_id', '=', 'tbl_category_products.category_id')->where('tbl_products.category_id', $id)
            ->orderBy('tbl_products.product_id', 'desc')
            ->get();

        // echo '<pre>';
        // print_r($related_product);
        // echo '</pre>';


        return view('front.content.page.show_category')
            ->with('cate_products', $cate_products)
            ->with('brand_products', $brand_products)
            ->with('all_category', $all_category)
            ->with('category_name', $category_name)
            ->with('related_product', $related_product);
    }


    public function show_brand_home($id)
    {
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        $related_products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();
        $array = (array)$related_products;
        $array1 = array_chunk($array, 1);
        $related_product = array_chunk($array1[0][0], 4);


        $brand_name = DB::table('tbl_brands_products')->where('brand_id', $id)->first();
        $all_brand = DB::table('tbl_products')
            ->join('tbl_brands_products', 'tbl_products.brand_id', '=', 'tbl_brands_products.brand_id')->where('tbl_products.brand_id', $id)
            ->orderBy('tbl_products.product_id', 'desc')
            ->get();

        return view('front.content.page.show_brand')
            ->with('cate_products', $cate_products)
            ->with('brand_products', $brand_products)
            ->with('all_brand', $all_brand)
            ->with('brand_name', $brand_name)
            ->with('related_product', $related_product);
    }


    public function product_details($id)
    {
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        $related_products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();
        $array = (array)$related_products;
        $array1 = array_chunk($array, 1);
        $related_product = array_chunk($array1[0][0], 4);

        $product_details = DB::table('tbl_products')
            ->join('tbl_brands_products', 'tbl_products.brand_id', '=', 'tbl_brands_products.brand_id')
            ->join('tbl_category_products', 'tbl_products.category_id', '=', 'tbl_category_products.category_id')
            ->where('tbl_products.product_id', $id)
            ->first();


        return view('front.content.page.show_details')
            ->with('cate_products', $cate_products)
            ->with('brand_products', $brand_products)
            ->with('product_details', $product_details)
            ->with('related_product', $related_product);
    }
}
