<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/favicon.png">
<title>TSHOP - Bootstrap E-Commerce Parallax Theme </title>
 
<link href="css/bootstrap.min.css" rel="stylesheet">
 
<link id="pagestyle" rel="stylesheet" type="text/css" href="css/skin-1.css">
 
<link href="css/style.css" rel="stylesheet">
  
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
 
<script>
    paceOptions = {
      elements: true
    };
</script>
<script src="assets/js/pace.min.js"></script>
<script src="assets/js/pace.min.js"></script>
 
<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
<h3 class="modal-title-site text-center"> Login to TSHOP </h3>
</div>
<div class="modal-body">
<div class="form-group login-username">
<div>
<input name="log" id="login-user" class="form-control input" size="20" placeholder="Enter Username" type="text">
</div>
</div>
<div class="form-group login-password">
<div>
<input name="Password" id="login-password" class="form-control input" size="20" placeholder="Password" type="password">
</div>
</div>
<div class="form-group">
<div>
<div class="checkbox login-remember">
<label>
<input name="rememberme" value="forever" checked="checked" type="checkbox">
Remember Me </label>
</div>
</div>
</div>
<div>
<div>
<input name="submit" class="btn  btn-block btn-lg btn-primary" value="LOGIN" type="submit">
</div>
</div>
 
</div>
<div class="modal-footer">
<p class="text-center"> Not here before? <a data-toggle="modal" data-dismiss="modal" href="#ModalSignup"> Sign Up. </a> <br>
<a href="forgot-password.html"> Lost your password? </a> </p>
</div>
</div>
 
</div>
 
</div>
 
 
<div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
<h3 class="modal-title-site text-center"> REGISTER </h3>
</div>
<div class="modal-body">
<div class="control-group"> <a class="fb_button btn  btn-block btn-lg " href="#"> SIGNUP WITH FACEBOOK </a> </div>
<h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5>
<div class="form-group reg-username">
<div>
<input name="login" class="form-control input" size="20" placeholder="Enter Username" type="text">
</div>
</div>
<div class="form-group reg-email">
<div>
<input name="reg" class="form-control input" size="20" placeholder="Enter Email" type="text">
</div>
</div>
<div class="form-group reg-password">
<div>
<input name="password" class="form-control input" size="20" placeholder="Password" type="password">
</div>
</div>
<div class="form-group">
<div>
<div class="checkbox login-remember">
<label>
<input name="rememberme" id="rememberme" value="forever" checked="checked" type="checkbox">
Remember Me </label>
</div>
</div>
</div>
<div>
<div>
<input name="submit" class="btn  btn-block btn-lg btn-primary" value="REGISTER" type="submit">
</div>
</div>
 
</div>
<div class="modal-footer">
<p class="text-center"> Already member? <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin"> Sign in </a> </p>
</div>
</div>
 
</div>
 
</div>
 
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
<div class="navbar-brand"><h1>Couponiter</h1></div>
 
 
</div>
 
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="active"> <a href="#"> Home </a> </li>
</ul>
 
 
</div>
 
</div>
 
</div>
 
<div class="search-full text-right"> <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
<div class="searchInputBox pull-right">
<input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search" class="search-input">
<button class="btn-nobg search-btn" type="submit"> <i class="fa fa-search"> </i> </button>
</div>
</div>
 
</div>
 
<div class="container main-container headerOffset">



<div class="morePost row featuredPostContainer style2">
<h3 class="section-title style2 text-center"><span>Today's best deals</span></h3>
<div class="container">
<div class="row xsResponse">

<div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
<div class="product">
<a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
<i class="glyphicon glyphicon-heart"></i>
</a>
<div class="image">
<div class="quickview">
<a title="Quick View" class="btn btn-xs  btn-quickview" data-target="#product-details-modal" data-toggle="modal"> Quick View </a>
</div><a href="product-details.html"><img src="http://mediaservice.rmn.com/image/7IUVROAPVZHZHIHE5MBSRZZQW4" alt="img" class="img-responsive"></a>
<div class="promotion"> <span class="new-product"> NEW</span> <span class="discount">15% OFF</span> </div>
</div>
<div class="description">
<h4><a href="product-details.html">aliquam erat volutpat</a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<span class="size">XL / XXL / S </span> </div>
<div class="price"> <span>$25</span> <span class="old-price">$75</span> </div>
<div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
</div>
</div>
 
<div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
<div class="product">
<a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
<i class="glyphicon glyphicon-heart"></i>
</a>
<div class="image">
<div class="quickview">
<a title="Quick View" class="btn btn-xs  btn-quickview" data-target="#product-details-modal" data-toggle="modal"> Quick View </a>
</div><a href="product-details.html"><img src="http://mediaservice.rmn.com/image/7IUVROAPVZHZHIHE5MBSRZZQW4" alt="img" class="img-responsive"></a>
<div class="promotion"> <span class="discount">15% OFF</span> </div>
</div>
<div class="description">
<h4><a href="product-details.html">ullamcorper suscipit lobortis </a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<span class="size">XL / XXL / S </span> </div>
<div class="price"> <span>$25</span> </div>
<div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
</div>
</div>
 
<div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
<div class="product">
<a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
<i class="glyphicon glyphicon-heart"></i>
</a>
<div class="image">
<div class="quickview">
<a title="Quick View" class="btn btn-xs  btn-quickview" data-target="#product-details-modal" data-toggle="modal"> Quick View </a>
</div><a href="product-details.html"><img src="http://mediaservice.rmn.com/image/7IUVROAPVZHZHIHE5MBSRZZQW4" alt="img" class="img-responsive"></a>
<div class="promotion"> <span class="new-product"> NEW</span> </div>
</div>
<div class="description">
<h4><a href="product-details.html">demonstraverunt lectores </a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<span class="size">XL / XXL / S </span> </div>
<div class="price"> <span>$25</span> </div>
<div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
</div>
</div>
 
<div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
<div class="product">
<a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
<i class="glyphicon glyphicon-heart"></i>
</a>
<div class="image">
<div class="quickview">
<a title="Quick View" class="btn btn-xs  btn-quickview" data-target="#product-details-modal" data-toggle="modal"> Quick View </a>
</div><a href="product-details.html"><img src="http://mediaservice.rmn.com/image/7IUVROAPVZHZHIHE5MBSRZZQW4" alt="img" class="img-responsive"></a> </div>
<div class="description">
<h4><a href="product-details.html">humanitatis per</a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<span class="size">XL / XXL / S </span> </div>
<div class="price"> <span>$25</span> </div>
<div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
</div>
</div>
 
</div>
 
<div class="row">
<div class="load-more-block text-center"> <a class="btn btn-thin" href="#"> <i class="fa fa-plus-sign">+</i> load more deals</a> </div>
</div>
</div>







</div>
<div style="clear:both"> </div>
</div> 
<div class="gap"> </div>
<footer>
<div class="footer">
<div class="container">
<div class="row">
<div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
<h3> Support </h3>
<ul>
<li class="supportLi">
<p> Lorem ipsum dolor sit amet, consectetur </p>
<h4> <a class="inline" href="callto:+88016000000"> <strong> <i class="fa fa-phone"> </i> 88 0160 000 000</strong> </a> </h4>
<h4> <a class="inline" href="/cdn-cgi/l/email-protection#2a424f465a6a5e5942455a5d4f4804494547"> <i class="fa fa-envelope-o"> </i> <span class="__cf_email__" data-cfemail="d1b9b4bda191a5a2b9bea1a6b4b3ffb2bebc">[email&#160;protected]</span><script cf-hash='f9e31' type="text/javascript">
/* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script> </a> </h4>
</li>
</ul>
</div>
<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
<h3> Shop </h3>
<ul>
<li> <a href="index.html"> Home </a> </li>
<li> <a href="category.html"> Category </a> </li>
<li> <a href="category2.html"> Category Style 2 [Parallax] </a> </li>
<li> <a href="sub-category.html"> Sub Category </a> </li>
</ul>
</div>
<div style="clear:both" class="hide visible-xs"></div>
<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
<h3> Information </h3>
<ul>
<li> <a href="product-details.html"> Product Details </a> </li>
<li> <a href="product-details-style2.html"> Product Details Version 2 </a> </li>
<li> <a href="cart.html"> Cart </a> </li>
<li> <a href="about-us.html"> About us </a> </li>
<li> <a href="about-us-2.html"> About us 2 </a> </li>
<li> <a href="contact-us.html"> Contact us </a> </li>
<li> <a href="contact-us-2.html"> Contact us 2 </a> </li>
<li> <a href="terms-conditions.html"> Terms &amp; Conditions </a> </li>
</ul>
</div>
<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
<h3> My Account </h3>
<ul>
<li> <a href="account-1.html"> Account Login </a> </li>
<li> <a href="account.html"> My Account </a> </li>
<li> <a href="my-address.html"> My Address </a> </li>
<li> <a href="wishlist.html"> Wish List </a> </li>
<li> <a href="order-list.html"> Order list </a> </li>
<li> <a href="order-status.html"> Order Status </a> </li>
</ul>
</div>
<div style="clear:both" class="hide visible-xs"></div>
<div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
<h3> Stay in touch </h3>
<ul>
<li>
<div class="input-append newsLatterBox text-center">
<input type="text" class="full text-center" placeholder="Email ">
<button class="btn  bg-gray" type="button"> Subscribe <i class="fa fa-long-arrow-right"> </i> </button>
</div>
</li>
</ul>
<ul class="social">
<li> <a href="http://facebook.com"> <i class=" fa fa-facebook"> &nbsp; </i> </a> </li>
<li> <a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a> </li>
<li> <a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a> </li>
<li> <a href="http://youtube.com"> <i class="fa fa-pinterest"> &nbsp; </i> </a> </li>
<li> <a href="http://youtube.com"> <i class="fa fa-youtube"> &nbsp; </i> </a> </li>
</ul>
</div>
</div>
 
</div>
 
</div> 
<div class="footer-bottom">
<div class="container">
<p class="pull-left">
&copy; TSHOP 2014. All right reserved.
</p>
<div class="pull-right paymentMethodImg"> <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img"> <img height="30" class="pull-right" src="images/site/payment/visa_card.png" alt="img"><img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img"> <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img"> <img height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img"> <img height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img">
</div>
</div>
</div> 
</footer>
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script> <script src="js/bootstrap.min.js"></script>
 
<script type="text/javascript" src="js/jquery.parallax-1.1.js"></script>
 
<script type="text/javascript" src="js/helper-plugins/jquery.mousewheel.min.js"></script>
 
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
 
<script type="text/javascript" src="js/ion-checkRadio/ion.checkRadio.min.js"></script>
 
<script src="js/grids.js"></script>
  <script src="js/owl.carousel.min.js"></script>
 
<script src="js/jquery.minimalect.min.js"></script>
 
<script src="js/bootstrap.touchspin.js"></script>
 
<script src="js/script.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>

