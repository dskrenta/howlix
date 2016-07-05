<html>
<head>
</head>
<body>

<!-- SDK -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '883798324967126',
          xfbml      : true,
          version    : 'v2.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

<!-- FB LOGOUT-->
<script>
FB.logout(function(response) {
  // user is now logged out
});
</script>

<!-- REDIRECT -->
<script>
//statusChangeCallback(response);
window.location.assign("http://howlix.com/shred/real2/shredfb2.php");
</script>

</body>
</html>
