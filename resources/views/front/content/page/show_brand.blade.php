@extends('front.content.content')


@section('showContent')

<div class="features_items">
  <!--features_items-->
  <h2 class="title text-center">{{ $brand_name->brand_name }} Items</h2>
  @foreach ($all_brand as $key => $product)
  <div class="col-sm-3">
    <div class="product-image-wrapper">
      <div class="single-products">
        <div class="productinfo text-center">
            <a href="{{ route('chi-tiet-san-pham',['id'=>$product->product_id]) }}">
                <img src={{ url("upload/products_image"). "/". $product->product_image }} alt="" />
            </a>
          <h2>$
            {{ number_format($product->product_price) }}
          </h2>
          <p>
            {{ $product->product_name }}
          </p>
          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
      </div>
      <div class="choose">
        <ul class="nav nav-pills nav-justified">
          <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
          <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
        </ul>
      </div>
    </div>
  </div>
  @endforeach

</div>



@endsection