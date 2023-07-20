<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $productID = $request->productid_id;
        $user_id = Auth::user()->id;
        if ($request->cart_qty) {
            $quantity = $request->cart_qty;
        } else {
            $quantity = 1;
        }

        // $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        // $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        // $related_products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();
        // $array = (array)$related_products;
        // $array1 = array_chunk($array, 1);
        // $related_product = array_chunk($array1[0][0], 4);

        $check_cart = DB::table('tbl_carts_product')->where([['product_id', $productID], ['user_id', $user_id]])->first();

        $product_cart = DB::table('tbl_products')->where('product_id', $productID)->first();

        if ($check_cart == null) {
            $data = array();
            $data['product_id'] = $product_cart->product_id;
            $data['user_id'] = $user_id;
            $data['cart_name'] = $product_cart->product_name;
            $data['quantity'] = $quantity;
            $data['cart_price'] = $product_cart->product_price;
            $data['cart_image'] = $product_cart->product_image;

            // dd($data);
            // dd(Route::current());
            DB::table('tbl_carts_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm vào giỏ hàng thành công');
        } else {
            $tatol = (int)$quantity + (int)$check_cart->quantity;
            DB::table('tbl_carts_product')->where('cart_id', $check_cart->cart_id)->update(['quantity' => $tatol]);
            Session::put('message', 'Thêm sản phẩm vào giỏ hàng thành công');
        }


        return back();
    }

    public function index()
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user_cart = DB::table('tbl_carts_product')->where('user_id', $user_id)->orderBy('cart_id', 'desc')->get();
        }

        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->where('brand_status', '1')->orderBy('brand_id', 'asc')->get();
        $related_products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();
        $array = (array)$related_products;
        $array1 = array_chunk($array, 1);
        $related_product = array_chunk($array1[0][0], 4);


        return view('front.content.page.show_cart')
            ->with('cate_products', $cate_products)
            ->with('brand_products', $brand_products)
            ->with('related_product', $related_product)
            ->with('user_cart', $user_cart);
    }

    public function update_qty($id, Request $request)
    {
        $quantity = $request->quantity;

        if ($quantity == 0) {
            DB::table('tbl_carts_product')->where('cart_id', $id)->delete();
        } else {
            DB::table('tbl_carts_product')->where('cart_id', $id)->update(['quantity' => $quantity]);
        }
        // Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return back();
    }

    public function delete_cart($id)
    {
        DB::table('tbl_carts_product')->where('cart_id', $id)->delete();

        return back();
    }
}
