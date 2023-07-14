@extends('dashboard.admin')


@section('admin_category')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of products
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php 
        $message = Session::get('message');
      
        if ($message) { ?>
        <span style="color: red" class="text-alert"><?= $message ?></span>
        <?php Session::put('message',null) ?>
        <?php }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Project</th>
            <th>Mô tả</th>
            <th>Hiển thị</th>
            <th>action</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($data_all_category as $key => $val)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>
              {{ $val->category_name }}
            </td>
            <td>
              {{ $val->category_desc }}
            </td>
            <td><span class="text-ellipsis">
                <?php if ($val->category_status == 0 ) { ?>

                <a href="{{ route('unactive-category-status',['id' => $val->category_id]) }}"><i class="fa-thumbs-styling fa fa-thumbs-down"></i></a>
                <?php } else { ?>
                <a href="{{ route('active-category-status',['id'  => $val->category_id]) }}"><i class="fa-thumbs-styling fa fa-thumbs-up"></i></a>
                <?php }  ?>
              </span></td>
            <td>
              <a href="{{ route('edit-category-products',['id' => $val->category_id]) }}" class="active" ui-toggle-class=""><span class="mr-2"><i class="fa fa-pencil-square-o text-success text-active"></i></span></a>
              <a href="{{ route('delete-category-products',['id' => $val->category_id]) }}" onclick="return confirm('Are you sure to delete?')" class="active" ui-toggle-class=""><span><i class="fa fa-times text-danger text"></i></span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection