<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>E-Shopper</title>
  <link href={{ url("front/css/bootstrap.min.css") }} rel="stylesheet">
  <link href={{ url("front/css/font-awesome.min.css") }} rel="stylesheet">
  <link href={{ url("front/css/prettyPhoto.css") }} rel="stylesheet">
  <link href={{ url("front/css/price-range.css") }} rel="stylesheet">
  <link href={{ url("front/css/animate.css") }} rel="stylesheet">
  <link href={{ url("front/css/main.css") }} rel="stylesheet">
  <link href={{ url("front/css/responsive.css") }} rel="stylesheet">
  <link href={{ url("front/css/style.css") }} rel="stylesheet">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  <link rel="shortcut icon" href={{ url("images/ico/favicon.ico") }}>
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href={{ url("images/ico/apple-touch-icon-144-precomposed.png") }}>
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href={{ url("images/ico/apple-touch-icon-114-precomposed.png") }}>
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href={{ url("images/ico/apple-touch-icon-72-precomposed.png") }}>
  <link rel="apple-touch-icon-precomposed" href={{ url("images/ico/apple-touch-icon-57-precomposed.png") }}>
</head>
<!--/head-->

<body>
  <header id="header">
    <!--header-->

    <div class="header-middle">
      <!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="index.html"><img src="{{ url("front/images/home/logo.png") }}" alt="" /></a>
            </div>
            <div class="btn-group pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  USA
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canada</a></li>
                  <li><a href="#">UK</a></li>
                </ul>
              </div>

              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  DOLLAR
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canadian Dollar</a></li>
                  <li><a href="#">Pound</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                <li>
                  <?php if(Auth::user()){ ?>
                  <a href="{{ route('cart-user') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                  <?php } else { ?>
                  <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                  <?php } ?>

                </li>
                <?php if(Auth::user()) { ?>
                <li class="dropdown-user">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <?php if (Auth::user()->images == null) { ?>
                    <img alt="" src={{ url("upload/png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png") }}>
                    <?php } else { ?>
                    <img alt="" src={{ url("upload/user_image"). "/". Auth::user()->images }}>
                    <?php } ?>

                    <span class="username">
                      {{ Auth::user()->name }}</span>
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="{{ route('user-logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                  </ul>
                </li>
                <?php } else { ?>
                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
      <!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="{{ route('/') }}" class="active">Home</a></li>
                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    <li><a href="shop.html">Products</a></li>
                    <li><a href="product-details.html">Product Details</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="#">Cart</a></li>
                    <li><a href="login.html">Login</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a></li>
                <li><a href="{{ route('cart-user') }}">Giỏ hàng</a></li>
                <li><a href="contact-us.html">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <input type="text" placeholder="Search" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/header-bottom-->
  </header>
  <!--/header-->

  <section id="slider">
    <!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>Free E-Commerce Template</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-6">
                  <img src="{{ url("front/images/home/girl1.jpg") }}" class="girl img-responsive" alt="" />
                  <img src="{{ url("front/images/home/pricing.png") }}" class="pricing" alt="" />
                </div>
              </div>
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>100% Responsive Design</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-6">
                  <img src="{{ url("front/images/home/girl2.jpg") }}" class="girl img-responsive" alt="" />
                  <img src="{{ url("front/images/home/pricing.png") }}" class="pricing" alt="" />
                </div>
              </div>

              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOPPER</h1>
                  <h2>Free Ecommerce Template</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="col-sm-6">
                  <img src="{{ url("front/images/home/girl3.jpg") }}" class="girl img-responsive" alt="" />
                  <img src="{{ url("front/images/home/pricing.png") }}" class="pricing" alt="" />
                </div>
              </div>

            </div>

            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--/slider-->

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>DANH MỤC SẢN PHẨM</h2>
            <div class="panel-group category-products" id="accordian">
              <!--category-productsr-->
              @foreach ($cate_products as $key => $val_cate)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="{{ route('danh-muc-san-pham',['id'=>$val_cate->category_id]) }}">
                      {{ $val_cate->category_name }}</a></h4>
                </div>
              </div>
              @endforeach
            </div>
            <!--/category-products-->

            <div class="brands_products">
              <!--brands_products-->
              <h2>THƯƠNG HIỆU SẢN PHẨM</h2>
              <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                  @foreach ($brand_products as $key=>$val_brand)
                  <li><a href="{{ route('thuong-hieu-san-pham',['id'=>$val_brand->brand_id]) }}"> <span class="pull-right">(50)</span>
                      {{ $val_brand->brand_name }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <!--/brands_products-->

            <div class="price-range">
              <!--price-range-->
              <h2>Price Range</h2>
              <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
              </div>
            </div>
            <!--/price-range-->

            <div class="shipping text-center">
              <!--shipping-->
              <img src="{{ url("front/images/home/shipping.jpg") }}" alt="" />
            </div>
            <!--/shipping-->

          </div>
        </div>
        {{-- content --}}
        @yield('content')



      </div>
    </div>
  </section>

  <footer id="footer">
    <!--Footer-->
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="companyinfo">
              <h2><span>e</span>-shopper</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
            </div>
          </div>
          <div class="col-sm-7">
            <div class="col-sm-3">
              <div class="video-gallery text-center">
                <a href="#">
                  <div class="iframe-img">
                    <img src="{{ url("front/images/home/iframe1.png") }}" alt="" />
                  </div>
                  <div class="overlay-icon">
                    <i class="fa fa-play-circle-o"></i>
                  </div>
                </a>
                <p>Circle of Hands</p>
                <h2>24 DEC 2014</h2>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="video-gallery text-center">
                <a href="#">
                  <div class="iframe-img">
                    <img src="{{ url("front/images/home/iframe2.png") }}" alt="" />
                  </div>
                  <div class="overlay-icon">
                    <i class="fa fa-play-circle-o"></i>
                  </div>
                </a>
                <p>Circle of Hands</p>
                <h2>24 DEC 2014</h2>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="video-gallery text-center">
                <a href="#">
                  <div class="iframe-img">
                    <img src="{{ url("front/images/home/iframe3.png") }}" alt="" />
                  </div>
                  <div class="overlay-icon">
                    <i class="fa fa-play-circle-o"></i>
                  </div>
                </a>
                <p>Circle of Hands</p>
                <h2>24 DEC 2014</h2>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="video-gallery text-center">
                <a href="#">
                  <div class="iframe-img">
                    <img src="{{ url("front/images/home/iframe4.png") }}" alt="" />
                  </div>
                  <div class="overlay-icon">
                    <i class="fa fa-play-circle-o"></i>
                  </div>
                </a>
                <p>Circle of Hands</p>
                <h2>24 DEC 2014</h2>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="address">
              <img src="{{ url("front/images/home/map.png") }}" alt="" />
              <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Service</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Online Help</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Order Status</a></li>
                <li><a href="#">Change Location</a></li>
                <li><a href="#">FAQ’s</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Quock Shop</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">T-Shirt</a></li>
                <li><a href="#">Mens</a></li>
                <li><a href="#">Womens</a></li>
                <li><a href="#">Gift Cards</a></li>
                <li><a href="#">Shoes</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Policies</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privecy Policy</a></li>
                <li><a href="#">Refund Policy</a></li>
                <li><a href="#">Billing System</a></li>
                <li><a href="#">Ticket System</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>About Shopper</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Company Information</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Store Location</a></li>
                <li><a href="#">Affillate Program</a></li>
                <li><a href="#">Copyright</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3 col-sm-offset-1">
            <div class="single-widget">
              <h2>About Shopper</h2>
              <form action="#" class="searchform">
                <input type="text" placeholder="Your email address" />
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                <p>Get the most recent updates from <br />our site and be updated your self...</p>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
          <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
        </div>
      </div>
    </div>

  </footer>
  <!--/Footer-->

  <!-- thong bao dang nhap -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Errors</h5>
          <button type="button" class="close btn-login-add-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Hãy đăng nhập để mua hàng
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{ route('login') }}" class="btn btn-primary btn-login-add">Login</a>
        </div>
      </div>
    </div>
  </div>


  <!-- thong bao them gio hang -->
  <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('add-to-cart') }}" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">thông báo</h5>
            <button type="button" class="close btn-login-add-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            bạn có muốn thêm vào giỏ hàng không
            {{ csrf_field() }}
            <input name="cart_qty" type="hidden" min="1" value="" />
            <input name="productid_id" type="hidden" value="" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary btn-login-add">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  {{-- nhập thông tin thanh toán --}}
  <div class="modal fade" id="cartOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route("/") }}" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">thông báo</h5>
            <button type="button" class="close btn-login-add-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="register-req">
              <p>Nhập địa chỉ nhận hàng</p>
            </div>
            <section id="cart_items">
              <div class="container">
                <div class="shopper-informations">
                  <div class="row">
                    <div class="col-sm-7">
                      <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                          {{ csrf_field() }}
                          <input type="text" placeholder="Email*">
                          <input type="text" placeholder="Phone*">
                          <input type="text" placeholder="Name *">
                          <input type="text" placeholder="Tỉnh/ Thành phố *">
                          <input type="text" placeholder="Quận/ Huyện *">
                          <input type="text" placeholder="Phường/ Xã *">
                          <input type="text" placeholder="Address *">
                          <input id="id-array-cart" type="hidden" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                      </div>
                    </div>
                    <div>
                      <label for="atm-bank" class="col-md-5">
                        <input type="checkbox" id="atm-bank" name="atm-bank" value="online_payment">
                        thanh toán qua thẻ ngân hàng
                      </label>
                      <label for="Payment-delivery" class="col-md-5">
                        <input type="checkbox" id="Payment-delivery" name="Payment-delivery" value="pay_later">
                        thanh toán khi nhận hàng
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!--/#cart_items-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-order-add">Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src={{ url("front/js/jquery.js") }}></script>
  <script src={{ url("front/js/bootstrap.min.js") }}></script>
  <script src={{ url("front/js/jquery.scrollUp.min.js") }}></script>
  <script src={{ url("front/js/price-range.js") }}></script>
  <script src={{ url("front/js/jquery.prettyPhoto.js") }}></script>
  <script src={{ url("front/js/main.js") }}></script>
  <script>
    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
    })

    $('#cartModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      const productid_hidden = button.attr("productID")
      var recipient = button.data('whatever')
      var qty = $('input[name=qty]').val()
      // var productid_hidden = $('input[name=productid_hidden]').val()
      var modal = $(this)
      $('input[name=cart_qty]').val(qty)
      $('input[name=productid_id]').val(productid_hidden)
    })

    $(document).ready(function() {
      $(".cart_qty_up").click(function() {
        const id = $(this).attr("cart_id_user")
        let val = $(`#${id}`).val()
        var qty_up = Number(val) + 1;

        $(`#${id}`).val(qty_up)

      })
      $(".cart_qty_down").click(function() {
        const id = $(this).attr("cart_id_user")
        let val = $(`#${id}`).val()
        if (val > 0) {
          var qty_up = Number(val) - 1;
          $(`#${id}`).val(qty_up)
        } else {
          $(`#${id}`).val(0)
        }
      })
    })

    var id_cart = [];
    function checkboxCartUser(id) {

      var checkBox = document.getElementById(`checkbox-cart-user${id}`);
      if (checkBox.checked == true) {
        let valID = $(`#${id}`).val()
        id_cart.push(valID)
        let priceCart = $(`#cart_total_price${id}`).attr("price_cart_user")
        let totalCartUser = $('#total_cart_user').text()
        let taxcart = $('#tax_cart').text()

        let sum = Number(priceCart) + Number(totalCartUser)
        let taxCart = (priceCart / 100) * 10
        let sumtax = Number(taxcart) + Number(taxCart)
        let total = Number(sum) + Number(sumtax)
        // const USDollar = new Intl.NumberFormat('en-US', {
        //   style: 'currency',
        //   currency: 'USD',
        // });

        $('#total_cart_user').text(sum)
        $('#tax_cart').text(sumtax.toFixed(2))
        $('#total_payment').text(total.toFixed(2))

      } else {
        let valID = $(`#${id}`).val()
        let index = id_cart.indexOf(valID)
        id_cart.splice(index, 1);
        let priceCart = $(`#cart_total_price${id}`).attr("price_cart_user")
        let totalCartUser = $('#total_cart_user').text()
        let taxcart = $('#tax_cart').text()

        let sum = Number(totalCartUser) - Number(priceCart)
        let taxCart = (priceCart / 100) * 10
        let sumtax = Number(taxcart) - Number(taxCart)
        let total = Number(sum) + Number(sumtax)

        $('#total_cart_user').text(sum)
        $('#tax_cart').text(sumtax.toFixed(2))
        $('#total_payment').text(total.toFixed(2))

      }
    }


    function add_order(){
        $('#id-array-cart').val(id_cart);
      }
  </script>



</body>

</html>