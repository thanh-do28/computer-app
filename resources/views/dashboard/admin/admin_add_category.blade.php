@extends('dashboard.admin')


@section('admin_category')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        More Category Products
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
          <form role="form" action="{{ route('add-category-products') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Tên danh mục</label>
              <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô tả danh mục</label>
              <textarea style="resize: none" rows="7" name="category_products_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
            </div>
            <div class="form-group">
              <label for="">Hiển thị</label>
              <select name="category_products_status" class="form-control input-sm m-bot15">
                <option value="0">Ẩn</option>
                <option value="1">Hiển thị</option>
              </select>
            </div>
            <div style="display: flex; justify-content: space-around;">
                <button type="submit" name="add_category_products" class="btn btn-info">Submit</button>
                <a href="{{ route('all-brand-products') }}" class="btn btn-info bg-danger">return</a>
            </div>

          </form>
        </div>

      </div>
    </section>

  </div>
</div>
@endsection
