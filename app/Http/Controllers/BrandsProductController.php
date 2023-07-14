<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class BrandsProductController extends Controller
{

    public function add_brand_products()
    {

        return view('dashboard.admin.admin_add_brands');
    }


    public function all_brand_products()
    {
        $all_brands_products = DB::table('tbl_brands_products')->get();

        $manager_brands_products = view('dashboard.admin.admin_all_brands')->with('data_all_brands', $all_brands_products);
        return view('dashboard.admin')->with('dashboard.admin.admin_all_brands', $manager_brands_products);
    }

    public function save_brand_products(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_products_desc;
        $data['brand_status'] = $request->brand_products_status;

        DB::table('tbl_brands_products')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return redirect()->route('add-brand-products');
    }

    public function active_brand_status($id)
    {
        DB::table('tbl_brands_products')->where('brand_id', $id)->update(['brand_status' => 0]);
        Session::put('message', 'ẩn thương hiệu sản phẩm thành công');
        return redirect()->route('all-brand-products');
    }

    public function unactive_brand_status($id)
    {
        // dd($id);
        DB::table('tbl_brands_products')->where('brand_id', $id)->update(['brand_status' => 1]);
        Session::put('message', 'hiện thương hiệu sản phẩm thành công');
        return redirect()->route('all-brand-products');
    }

    public function edit_brand_products($id)
    {
        $edit_brand_products = DB::table('tbl_brands_products')->where('brand_id', $id)->first();

        $data_brand_products = view('dashboard.admin.admin_update_brands')->with('data_edit_brand', $edit_brand_products);
        return view('dashboard.admin')->with('dashboard.admin.admin_update_brands', $data_brand_products);
    }


    public function update_brand_products($id, Request $request)
    {

        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_products_desc;

        DB::table('tbl_brands_products')->where('brand_id', $id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return redirect()->route('all-brand-products');
    }

    public function delete_brand_products($id)
    {
        DB::table('tbl_brands_products')->where('brand_id', $id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return redirect()->route('all-brand-products');
    }
}
