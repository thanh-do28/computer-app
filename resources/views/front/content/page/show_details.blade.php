@extends('front.content.content')


@section('showContent')
<div style="margin-left: 8rem; margin-right: 8rem;">
  <div class="product-details">
    <!--product-details-->
    <div class="col-sm-4">
      <div class="view-product">
        <img src={{ url("upload/products_image").'/'.$product_details->product_image}} alt="" />
        <h3>ZOOM</h3>
      </div>
      <div id="similar-product" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <a href=""><img src={{ url("upload/products_image").'/'.$product_details->product_image}} alt=""></a>
            <a href=""><img src={{ url("upload/products_image").'/'.$product_details->product_image}} alt=""></a>
            <a href=""><img src={{ url("upload/products_image").'/'.$product_details->product_image}} alt=""></a>
          </div>
        </div>

        <!-- Controls -->
        <a class="left item-control" href="#similar-product" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="right item-control" href="#similar-product" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>

    </div>
    <div class="col-sm-7">
      <div class="product-information">
        <!--/product-information-->
        <h2>
          {{ $product_details->product_name }}
        </h2>
        <p>Mã ID :
          {{ $product_details->product_id }}
        </p>

        {{-- <form action="{{ route('add-to-cart') }}" method="POST">
          {{ csrf_field() }} --}}
          <span>
            <span>US $
              {{ number_format($product_details->product_price) }}</span>
            <label>Quantity:</label>
            <input name="qty" type="number" min="1" value="1" />
            {{-- <input name="productid_hidden" type="hidden" value="{{ $product_details->product_id }}" /> --}}
          </span>
        {{-- </form> --}}
        <p>
          <?php if (Auth::user()) { ?>
            <button type="button" class="btn btn-primary" productID="{{ $product_details->product_id }}" data-toggle="modal" data-target="#cartModal">
              <i class="fa fa-shopping-cart"></i>
              Add to cart
            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-fefault cart" data-toggle="modal" data-target="#exampleModalCenter">
              <i class="fa fa-shopping-cart"></i>
              Add to cart
            </button>
          <?php } ?>
        </p>
        <p><b>Availability:</b> In Stock</p>
        <p><b>Condition:</b> New</p>
        <p><b>Brand:</b>
          {{ $product_details->brand_name }}
        </p>
        <p><b>Categoty:</b>
          {{ $product_details->category_name }}
        </p>
      </div>
      <!--/product-information-->
    </div>
  </div>
  <div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
        <li>
          <a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a>
        </li>
        <li>
          <a href="#reviews" data-toggle="tab">Reviews (5)</a>
        </li>
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane fade active in" id="details">
        <p>{!!$product_details->product_desc!!}</p>
      </div>

      <div class="tab-pane fade" id="companyprofile">
        <p>{!!$product_details->product_content!!}</p>
      </div>

      <div class="tab-pane fade " id="reviews">
        <div class="col-sm-12">
          <ul>
            <li>
              <a href=""><i class="fa fa-user"></i>EUGEN</a>
            </li>
            <li>
              <a href=""><i class="fa fa-clock-o"></i>12:41 PM</a>
            </li>
            <li>
              <a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a>
            </li>
          </ul>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua.Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquip ex ea commodo
            consequat.Duis aute irure dolor in reprehenderit in
            voluptate velit esse cillum dolore eu fugiat nulla
            pariatur.
          </p>
          <p><b>Write Your Review</b></p>

          <form action="#">
            <span>
              <input type="text" placeholder="Your Name" />
              <input type="email" placeholder="Email Address" />
            </span>
            <textarea name=""></textarea>
            <b>Rating: </b>
            <img src="images/product-details/rating.png" alt="" />
            <button type="button" class="btn btn-default pull-right">
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection