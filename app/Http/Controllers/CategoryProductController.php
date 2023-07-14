<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CategoryProductController extends Controller
{
    public function add_category_products()
    {
        return view('dashboard.admin.admin_add_category');
    }
    public function all_category_products()
    {
        $all_category_products = DB::table('tbl_category_products')->get();

        $manager_category_products = view('dashboard.admin.admin_all_category')->with('data_all_category', $all_category_products);
        return view('dashboard.admin')->with('dashboard.admin.admin_all_category', $manager_category_products);
    }

    public function save_category_products(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_products_desc;
        $data['category_status'] = $request->category_products_status;

        DB::table('tbl_category_products')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return redirect()->route('add-category-products');
    }

    public function active_category_status($id)
    {
        DB::table('tbl_category_products')->where('category_id', $id)->update(['category_status' => 0]);
        Session::put('message', 'ẩn danh mục sản phẩm thành công');
        return redirect()->route('all-category-products');
    }

    public function unactive_category_status($id)
    {
        // dd($id);
        DB::table('tbl_category_products')->where('category_id', $id)->update(['category_status' => 1]);
        Session::put('message', 'hiện danh mục sản phẩm thành công');
        return redirect()->route('all-category-products');
    }

    public function edit_category_products($id)
    {
        $edit_category_products = DB::table('tbl_category_products')->where('category_id', $id)->first();

        $data_category_products = view('dashboard.admin.admin_update_category')->with('data_edit_category', $edit_category_products);
        return view('dashboard.admin')->with('dashboard.admin.admin_update_category', $data_category_products);
    }

    public function update_category_products($id, Request $request)
    {

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_products_desc;

        DB::table('tbl_category_products')->where('category_id', $id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return redirect()->route('all-category-products');
    }

    public function delete_category_products($id)
    {
        DB::table('tbl_category_products')->where('category_id', $id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return redirect()->route('all-category-products');
    }
}
