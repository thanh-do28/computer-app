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
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td style="width:20px;">
              <label class="i-checks m-b-none">
                <input onclick="checkboxCartUser()" id="checkbox-cart-user" type="checkbox">
              </label>
            </td>
            <td class="image">image</td>
            <td class="description">name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td>action</td>
          </tr>
        </thead>
        <tbody>

          @foreach ($user_cart as $key => $cart)
          <tr class="tr_cart">
            <form role="form" action="{{ route('update-cart-qty', ['id' => $cart->cart_id]) }}" method="post">
              <td><label class="i-checks m-b-none"><input  onclick="checkboxCartUser({{ $cart->cart_id }})" id="checkbox-cart-user{{ $cart->cart_id }}"  type="checkbox" name="post[]"></label></td>
              <td class="cart_image">
                <img src={{ url("upload/products_image").'/'.$cart->cart_image}} alt="">
              </td>
              <td class="">
                <h4>
                  {{ $cart->cart_name }}
                </h4>
              </td>
              <td class="cart_price">
                <p>$
                  {{ number_format($cart->cart_price) }}
                </p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <button type="button" class="cart_qty_up" cart_id_user="{{ $cart->cart_id }}"> + </button>
                  {{ csrf_field() }}
                  <input id="{{ $cart->cart_id }}" class="cart_qty_input" type="text" name="quantity" value="{{ number_format($cart->quantity) }}">
                  <button type="button" class="cart_qty_down" cart_id_user="{{ $cart->cart_id }}"> - </button>
                </div>
              </td>
              <td class="cart_total">
                <p id="cart_total_price{{ $cart->cart_id }}" price_cart_user="{{ (int)$cart->cart_price  * (int)$cart->quantity }}" class="cart_total_price">$ {{number_format( (int)$cart->cart_price  * (int)$cart->quantity )}}</p>
              </td>
              <td class="cart_delete">
                <a href="{{ route('delete-cart',['id' => $cart->cart_id]) }}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-times"></i></a>
                <button type="submit"><i class="fa fa-pencil-square-o text-success text-active"></i></button>
              </td>
            </form>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</section>
<!--/#cart_items-->
<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next?</h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="chose_area">
          <ul class="user_option">
            <li>
              <input type="checkbox">
              <label>Use Coupon Code</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Use Gift Voucher</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Estimate Shipping & Taxes</label>
            </li>
          </ul>
          <ul class="user_info">
            <li class="single_field">
              <label>Country:</label>
              <select>
                <option>United States</option>
                <option>Bangladesh</option>
                <option>UK</option>
                <option>India</option>
                <option>Pakistan</option>
                <option>Ucrane</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field">
              <label>Region / State:</label>
              <select>
                <option>Select</option>
                <option>Dhaka</option>
                <option>London</option>
                <option>Dillih</option>
                <option>Lahore</option>
                <option>Alaska</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field zip-field">
              <label>Zip Code:</label>
              <input type="text">
            </li>
          </ul>
          <a class="btn btn-default update" href="">Get Quotes</a>
          <a class="btn btn-default check_out" href="">Continue</a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="total_area">
          <ul>
            <li>Cart Sub Total <span><span>$</span><span id="total_cart_user">0</span></span></li>
            <li>Eco Tax <span><span>$</span><span id="tax_cart">0</span></span></li>
            <li>Shipping Cost <span id="shipping_fee">Free</span></li>
            <li>Total <span><span>$</span><span id="total_payment">0</span></span></li>
          </ul>
          <button type="button" onclick="add_order()" class="btn btn-default check_out" data-toggle="modal" data-target="#cartOrder">Order</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/#do_action-->

@endsection