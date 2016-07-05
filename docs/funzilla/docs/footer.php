<!-- Modal Uplaod -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalUpload" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Submit a video</h4>
      </div>
      <div class="modal-body">
         <form role="form" method="post" action="submit.php">
         <div class="form-group">
             <label for="exampleInputEmail1">Youtube URL:</label>
             <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Ex: https://www.youtube.com/watch?v=JnB9bvud6IU">
         </div>
         <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
         </form>
      </div>
    </div>
  </div>
</div>

<!--Share Dialog-->
<!--
<script>
function myFBShare()
{
	FB.ui({
     		method: 'share_open_graph',
     		action_type: 'og.likes',
     		action_properties: JSON.stringify({
      			object:'http://funzilla.tv',
     		})
    	}, function(response){});
}
</script>
-->

<!--Javascript SRC's-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/unveil.js"></script>

</body>
</html>
