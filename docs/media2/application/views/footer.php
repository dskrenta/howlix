<!-- FOOTER -->
<hr />
<footer>
<center>
<p>Funzilla.tv &copy; 2014</p>
</center>
</footer>

<!-- Modal Done -->
<div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="doneModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Points awarded!</h4>
      </div>
      <div class="modal-body">
	<center>
        <p class="lead">10 Points!</p>
	<span style="color:green;"><i class="fa fa-thumbs-o-up fa-5x"></i></span>
	<p></p>
        
	    <div class="row">
            <div class="col-md-6"><button type="button" onclick="myFBShare('http://funzilla.tv/post.php?id=2680')" class="btn btn-primary btn-lg btn-block active" data-toggle="tooltip" data-placement="bottom" title="100 Points"><i class="fa fa-facebook fa-lg"></i> Share on Facebook</button></div>
            <div class="col-md-6"><a href="https://twitter.com/share?url=" target="_blank"><button type="button" class="btn btn-info btn-lg btn-block active" data-toggle="tooltip" data-placement="bottom" title="100 Points"><i class="fa fa-twitter fa-lg"></i> Tweet it</button></a></div>
            </div>
          	</center>
      </div>
      <div class="modal-footer">
        
	    <a href="post.php?id=">
            <button type="button" class="btn btn-danger btn-lg btn-block active">Next Video <i class="glyphicon glyphicon-chevron-right"></i></button>
            </a>
	        </div>
    </div>
  </div>
</div>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>static/js/botstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>static/js/masonry.pkgd.min.js"></script>

<script>
$(function(){
  $('#container').masonry({
    // options
    itemSelector : '.item',
    columnWidth : 240
  });
});
</script>

</body>

<!--Infolinks-->
<!--
<script type="text/javascript">
var infolinks_pid = 2250328;
var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
-->

</html>
