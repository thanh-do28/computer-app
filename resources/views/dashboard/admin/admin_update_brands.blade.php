@extends('dashboard.admin')


@section('admin_brand')
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Update Brand Products
        </header>
        <div class="panel-body">
          <?php 
            $message = Session::get('message');
            
            if ($message) { ?>
              <span style="color: red" class="text-alert"><?= $message ?></span>
             <?php Session::put('message',null) ?>
            <?php }
          ?>
  
          <div class="position-center">
            <form role="form" action="{{ url('admin/update-brand-products',['id' => $data_edit_brand->brand_id]) }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleInputEmail1">Tên thương hiệu</label>
                <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" value="{{ $data_edit_brand->brand_name }}" placeholder="Tên danh mục">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                <textarea style="resize: none" rows="7" name="brand_products_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $data_edit_brand->brand_desc }}</textarea>
              </div>
              <div style="display: flex; justify-content: space-around;">
                  <button type="submit" name="update_brand_products" class="btn btn-info">Update</button>
                  <a href="{{ route('all-brand-products') }}" class="btn btn-info bg-danger">return</a>
              </div>
            </form>
          </div>
  
        </div>
      </section>
  
    </div>
  </div>
@endsection