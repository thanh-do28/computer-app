<!DOCTYPE html>

<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="dashboard/css/bootstrap.min.css">
  <!-- //bootstrap-css -->
  <!-- Custom CSS -->
  <link href="dashboard/css/style.css" rel='stylesheet' type='text/css' />
  <link href="dashboard/css/style-responsive.css" rel="stylesheet" />
  <!-- font CSS -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <!-- font-awesome icons -->
  <link rel="stylesheet" href="dashboard/css/font.css" type="text/css" />
  <link href="dashboard/css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <script src="dashboard/js/jquery2.0.3.min.js"></script>
</head>

<body>
  <div class="log-w3">
    <div class="w3layouts-main">
      <h2>Sign In Now</h2>
      <form action="/login" method="post">
        {{ csrf_field() }}
        <input type="email" class="ggg" name="Email" placeholder="E-MAIL" required="">
        <?php $error_login_mess = Session::get("error_login_mess");
			 if(isset($error_login_mess)){ ?>
        <h4><?= $error_login_mess ?></h4>
        <?php } ?>
        <input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="">
        <span><input type="checkbox" />Remember Me</span>
        <h6><a href="#">Forgot Password?</a></h6>
        <div class="clearfix"></div>
        <button type="submit" class="btn-login">Sign In</button>
      </form>
      <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
    </div>
  </div>
  <script src="dashboard/js/bootstrap.js"></script>
  <script src="dashboard/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="dashboard/js/scripts.js"></script>
  <script src="dashboard/js/jquery.slimscroll.js"></script>
  <script src="dashboard/js/jquery.nicescroll.js"></script>
  <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
  <script src="dashboard/js/jquery.scrollTo.js"></script>
</body>

</html>