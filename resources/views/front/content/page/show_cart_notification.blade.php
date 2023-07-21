@extends('front.content.content')


@section('showContent')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="{{ route('/') }}">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>

    <div class="container_cart_error">
        <div class="notice error"><p>bạn chưa có sản phẩm, hãy đăng nhập để thêm sản phẩm.</p></div>
    </div>
  </div>
</section>

@endsection