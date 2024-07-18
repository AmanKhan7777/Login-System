<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
//$exists==false;

//check whether this username exists
$existSql = "SELECT * FROM `users` WHERE username = '$username'";
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows > 0){
    //$exists = true;
    $showError = "Username Already Exists";
}
else
{
  //$exists = false;
if(($password == $cpassword)){
  $hash = password_hash($password, PASSWORD_DEFAULT);
   $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
   $result = mysqli_query($conn, $sql);
   if($result){
      $showAlert = true;
   }
  }
  else
  {
    $showError = "Password do not match";
     }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/lf/Login_v3/index.html?username=rizwawadawakhana%40gmail.com&pass=1213 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Jun 2023 05:07:02 GMT -->
<head>
<title>Signup</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<meta name="robots" content="noindex, follow">
<script nonce="e5e270e0-897f-4a95-a3ce-d75ec265528f">(function(w,d){!function(Y,Z,_,ba){Y[_]=Y[_]||{};Y[_].executed=[];Y.zaraz={deferred:[],listeners:[]};Y.zaraz.q=[];Y.zaraz._f=function(bb){return function(){var bc=Array.prototype.slice.call(arguments);Y.zaraz.q.push({m:bb,a:bc})}};for(const bd of["track","set","debug"])Y.zaraz[bd]=Y.zaraz._f(bd);Y.zaraz.init=()=>{var be=Z.getElementsByTagName(ba)[0],bf=Z.createElement(ba),bg=Z.getElementsByTagName("title")[0];bg&&(Y[_].t=Z.getElementsByTagName("title")[0].text);Y[_].x=Math.random();Y[_].w=Y.screen.width;Y[_].h=Y.screen.height;Y[_].j=Y.innerHeight;Y[_].e=Y.innerWidth;Y[_].l=Y.location.href;Y[_].r=Z.referrer;Y[_].k=Y.screen.colorDepth;Y[_].n=Z.characterSet;Y[_].o=(new Date).getTimezoneOffset();if(Y.dataLayer)for(const bk of Object.entries(Object.entries(dataLayer).reduce(((bl,bm)=>({...bl[1],...bm[1]})),{})))zaraz.set(bk[0],bk[1],{scope:"page"});Y[_].q=[];for(;Y.zaraz.q.length;){const bn=Y.zaraz.q.shift();Y[_].q.push(bn)}bf.defer=!0;for(const bo of[localStorage,sessionStorage])Object.keys(bo||{}).filter((bq=>bq.startsWith("_zaraz_"))).forEach((bp=>{try{Y[_]["z_"+bp.slice(7)]=JSON.parse(bo.getItem(bp))}catch{Y[_]["z_"+bp.slice(7)]=bo.getItem(bp)}}));bf.referrerPolicy="origin";bf.src="../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(Y[_])));be.parentNode.insertBefore(bf,be)};["complete","interactive"].includes(Z.readyState)?zaraz.init():Y.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
  <?php require "header.php" ?>
  <br><br>
  <?php
  if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is now created and you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '. $showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<div class="limiter">
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
<div class="wrap-login100">
<form class="login100-form validate-form" action="/Ecommerce/signup.php" method="post">
<span class="login100-form-logo">
<i class="zmdi zmdi-landscape"></i>
</span>
<span class="login100-form-title p-b-34 p-t-27">
Signup
</span>
<div class="wrap-input100 validate-input" data-validate="Enter username">
<input class="input100" maxlength="23" type="text" id="username" name="username"  placeholder="Username">
<span class="focus-input100" data-placeholder="&#xf207;"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Enter password">
<input class="input100" type="password" maxlength="23" id="password" name="password" placeholder="Password">
<span class="focus-input100" data-placeholder="&#xf191;"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Enter password">
<input class="input100" type="password" id="cpassword" name="cpassword"  placeholder="Confirm Password">
<span class="focus-input100" data-placeholder="&#xf191;"></span>
</div>
<div class="contact100-form-checkbox">
<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
<label class="label-checkbox100" for="ckb1">
Remember me
</label>
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn">
SignUp
</button>
</div>
<div class="text-center p-t-90">
<a class="txt1" href="#">
Forgot Password?
</a>
</div>
</form>
</div>
</div>
</div>       
<div id="dropDownSelect1"></div>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/animsition/js/animsition.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>

<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>

<script src="vendor/countdowntime/countdowntime.js"></script>

<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7d365cc77f2cc908","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>    
</body>
<!-- Mirrored from colorlib.com/etc/lf/Login_v3/index.html?username=rizwawadawakhana%40gmail.com&pass=1213 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Jun 2023 05:07:06 GMT -->
</html>