<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Latest On ShredFeed</title>

<!-- Bootstrap -->
<link href="http://egon.io/shred2/css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="http://egon.io/shred2/css/style.css" />
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://egon.io/shred2/js/bootstrap.js"></script>

<script type="text/javascript">
jQuery(function ($) { $("a").tooltip() });
</script>
<script type="text/javascript">
  function launch_modal(id) {
     // Hide all modals using class if required.
     $('.modal').modal('hide');
     $('#'+id).modal('show');
  }
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#selectall').click(function () {
        $('.selectedId').prop('checked', this.checked);
    });

    $('.selectedId').change(function () {
        var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
        $('#selectall').prop("checked", check);
    });
});
</script>

<script type='text/javascript'> 
$(window).load(function(){
    $('#submit-success').hide();
    $('#submitShred').on('click', function () {
        console.log('here');
        $('#submit-success').show();
    });
}); 
</script>
<script type="text/javascript"> 
	$(function(){ 
		if (document.location.href.indexOf('invite=yes') > 0) 
		$("#inviteUrl").show();
		if (document.location.href.indexOf('tutorial=yes') > 0) 
		$(".theTutorial").show();
	});
</script>
</head>
<body id="content">
