@extends('dashboard.admin')


@section('admin_products')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        More Products
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
          <form role="form" action="{{ url('admin/update-products',['id' => $edit_products->product_id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên sản phẩm</label>
              <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{ $edit_products->product_name }}" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="">Danh mục sản phẩm</label>
              <select name="category_id" class="form-control input-sm m-bot15">
                @foreach ($cate_products as $key => $cate)
                @if ($cate->category_id == $edit_products->category_id)
                <option selected value="{{ $cate->category_id }}">
                  {{ $cate->category_name }}
                </option>
                @else
                <option value="{{ $cate->category_id }}">
                  {{ $cate->category_name }}
                </option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Thương hiệu sản phẩm</label>
              <select name="brand_id" class="form-control input-sm m-bot15">
                @foreach ($brand_products as $key => $brand)
                @if ($brand->brand_id == $edit_products->brand_id)
                <option selected value="{{ $brand->brand_id }}">
                  {{ $brand->brand_name }}
                </option>
                @else
                <option value="{{ $brand->brand_id }}">
                  {{ $brand->brand_name }}
                </option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả sản phẩm</label>
              <textarea style="resize: none" rows="7" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_products->product_desc }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nội dung sản phẩm</label>
              <textarea style="resize: none" rows="7" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_products->product_content }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Giá sản phẩm</label>
              <input type="text" name="product_price" class="form-control" id="exampleInputPassword1" value="{{ $edit_products->product_price }}" placeholder="Mô tả danh mục">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Ảnh sản phẩm</label>
              <input type="file" name="product_image" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
              <img src={{ url("upload/products_image"). "/". $edit_products->product_image }} style="height:5rem; width:5rem;" alt="no">
            </div>
            <div style="display: flex; justify-content: space-around;">
              <button type="submit" name="add_products" class="btn btn-info">Submit</button>
              <a href="{{ route('all-products') }}" class="btn btn-info bg-danger">return</a>
            </div>

          </form>
        </div>

      </div>
    </section>

  </div>
</div>
@endsection