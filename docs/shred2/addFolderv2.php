<?php
// ShredFeed index.php

// Required 
//require 'save.php';
require 'sql.php';
require 'functions.php';

// Headers
require 'header.php';
require 'fb_main.php';

// Main
require 'sidebar.php';

?>

<div class="col-md-9 create-folder" id="mainCol">
		<div id="submit-success" class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Success!</strong> Your friends will now be notified about their new ShredFeeds!
		</div>

		<div class="alert fade in" id="signUpPromo" style="display:none;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<img src="imgs/promo.png" class="fr mr15" />
			<h4><strong>Add your own songs on ShredFeedx</strong></h4>
			<p>ShredFeed is a music community to collect and share songs.</p>
			<p>
				<a href="index.html" class="btn btn-primary">Sign Up!</a> 
			</p>
		</div>

		<h2>Create A New ShredFeed Folder</h2>

		<form method="post" action="folderNewv2.php" enctype="multipart/form-data">

		<p><strong>Give your folder a name:</strong></p>
		<input type="text" placeholder="" name="folder" style="width: 70%;" />

		<br /><br /><br />

		<p><strong>Add content to your folder:</strong></p>

		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#createWeb" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-link mr5"></span>Website</a></li>
			<li><a href="#createImg" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture mr5"></span>Image</a></li>
			<li><a href="#createDoc" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-file mr5"></span>Document</a></li>
			<li><a href="#createVid" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-film mr5"></span>Video</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="createWeb">
                                <div class="modal-body">
                                        <h4>Add a URL to your folder:</strong></h4>
                                        <input type="text" name="url" placeholder="http://..." style="width: 70%;" />
                                        <!-- <span class="glyphicon glyphicon-plus ml15"></span> -->
                                </div>
                        </div>
                        <div class="tab-pane fade" id="createImg">
                                <div class="modal-body">
                                        <h4>Add an image URL to your folder:</h4>
                                        <input type="text" name="image" placeholder="http://..." style="width: 70%;" />
                                        <!-- <p class="mt15">or upload your own image:</p>-->
                                        <p class="mt15">or <a href="#createDoc" role="tab" data-toggle="tab">upload</a> your own image.
					<h4>Add an image title:</h4>
                                        <input type="text" name="imgTitle" placeholder="" style="width: 70%;" />
                                </div>
                        </div>
                        <div class="tab-pane fade" id="createDoc">
                                <div class="modal-body">
                                        <h4>Upload a document to your folder:</h4>
                                        <input type="file" name="file" id="file">
                                </div>
                        </div>
                        <div class="tab-pane fade" id="createVid">
                                <div class="modal-body">
                                        <h4>Add Youtube or Vimeo embed code:</strong></h4>
                                        <input type="text" name="video" placeholder="" style="width: 70%;" />
                                        <!-- <span class="glyphicon glyphicon-plus ml15"></span> -->
                                </div>
                        </div>
		</div>

		<br /><br /><hr />

		<?php
          		require_once('recaptchalib.php');
          		$publickey = "6LeKFPcSAAAAAF7Hc-d_4L6jt0paE7P8Y7f8tWw7"; // you got this from the signup page
          		echo recaptcha_get_html($publickey);
        	?>
		
		<hr />
	
		<button type="submit" class="btn btn-primary">Create Folder</button>
		<a href="http://howlix.com/shred2/main.php" class="btn btn-default fr">Cancel</a>
		
		</form>
	</div>	

<?php
// Footers
require 'footer.php'; 
?>
