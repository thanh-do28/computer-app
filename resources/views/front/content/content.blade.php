@extends('front.index')


@section('content')


<div class="col-sm-9 padding-right">

  @yield('showContent')

  <div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($related_product as $key => $related)
        <?php if($key == 0) { ?>
        <div class="item active">
          @foreach ($related as $key => $related_val)
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo-suggest text-center">
                  <a href="{{ route('chi-tiet-san-pham',['id'=>$related_val->product_id]) }}">
                    <img src="{{ url("upload/products_image"). "/". $related_val->product_image }}" alt="" />
                  </a>
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <?php if (Auth::user()) { ?>
                  <button type="button" class="btn btn-primary" productID="{{ $related_val->product_id }}" data-toggle="modal" data-target="#cartModal">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                  </button>
                  <?php } else { ?>
                  <button type="button" class="btn btn-fefault cart" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                  </button>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <?php } else { ?>
        {{-- item --}}
        <div class="item">
          @foreach ($related as $key => $related_val)
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo-suggest text-center">
                  <a href="{{ route('chi-tiet-san-pham',['id'=>$related_val->product_id]) }}">
                    <img src="{{ url("upload/products_image"). "/". $related_val->product_image }}" alt="" />
                  </a>
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <?php if (Auth::user()) { ?>
                  <button type="button" class="btn btn-primary" productID="{{ $related_val->product_id }}" data-toggle="modal" data-target="#cartModal">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                  </button>
                  <?php } else { ?>
                  <button type="button" class="btn btn-fefault cart" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                  </button>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <?php } ?>
        @endforeach


      </div>
      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </div>
  </div>
</div>
@endsection