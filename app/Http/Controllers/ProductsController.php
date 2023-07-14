<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function add_products()
    {
        $cate_products = DB::table('tbl_category_products')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->orderBy('brand_id', 'asc')->get();

        return view('dashboard.admin.admin_add_products')->with('cate_products', $cate_products)->with('brand_products', $brand_products);
    }


    public function all_products()
    {
        $all_products = DB::table('tbl_products')
            ->join('tbl_brands_products', 'tbl_products.brand_id', '=', 'tbl_brands_products.brand_id')
            ->join('tbl_category_products', 'tbl_products.category_id', '=', 'tbl_category_products.category_id')
            ->orderBy('tbl_products.product_id', 'desc')
            ->get();
        // dd($all_products);
        $manager_products = view('dashboard.admin.admin_all_products')->with('data_all_products', $all_products);
        return view('dashboard.admin')->with('dashboard.admin.admin_all_products', $manager_products);
    }

    public function save_products(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        // product_image
        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/products_image', $new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_products')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return redirect()->route('add-products');
        } else {
            $data['product_image'] = '';
            DB::table('tbl_products')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return redirect()->route('add-products');
        }
    }

    public function active_products_status($id)
    {
        DB::table('tbl_products')->where('product_id', $id)->update(['product_status' => 0]);
        Session::put('message', 'ẩn sản phẩm thành công');
        return redirect()->route('all-products');
    }

    public function unactive_products_status($id)
    {
        DB::table('tbl_products')->where('product_id', $id)->update(['product_status' => 1]);
        Session::put('message', 'hiện sản phẩm thành công');
        return redirect()->route('all-products');
    }

    public function edit_products($id)
    {
        $cate_products = DB::table('tbl_category_products')->orderBy('category_id', 'asc')->get();
        $brand_products = DB::table('tbl_brands_products')->orderBy('brand_id', 'asc')->get();
        $edit_products = DB::table('tbl_products')->where('product_id', $id)->first();
        // dd($edit_products);
        $manager_products = view('dashboard.admin.admin_update_products')->with('edit_products', $edit_products)->with('cate_products', $cate_products)->with('brand_products', $brand_products);
        return view('dashboard.admin')->with('dashboard.admin.admin_update_products', $manager_products);
    }


    public function update_products($id, Request $request)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/products_image', $new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_products')->where('product_id', $id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return redirect()->route('all-products');
        } else {
            DB::table('tbl_products')->where('product_id', $id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return redirect()->route('all-products');
        }
    }

    public function delete_products($id)
    {
        DB::table('tbl_products')->where('product_id', $id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return redirect()->route('all-products');
    }
}
