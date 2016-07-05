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

// GET
$folder_get = $_GET["folder"];
//echo $folder_get;

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

		<h2>Recommend Content To <?php echo $folder_get; ?></h2>

		<form method="post" action="recommendNew.php" enctype="multipart/form-data">

		<!--
		<p><strong>Give your folder a name:</strong></p>
		<input type="text" placeholder="" name="folder" style="width: 70%;" />
		-->

		<input type="hidden" name="folder" value="<?php echo $folder_get; ?>" />

		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#createWeb" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-link mr5"></span>Website</a></li>
			<li><a href="#createImg" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture mr5"></span>Image</a></li>
			<li><a href="#createDoc" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-file mr5"></span>Document</a></li>
			<li><a href="#createVid" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-film mr5"></span>Video</a></li>
			<li><a href="#createImport" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-cloud-upload mr5"></span>Import</a></li>
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
			<div class="tab-pane fade" id="createImport">
				<div class="modal-body panel-popup">
					<h4>Import content from the following folders:</h4>
					<div id="folderButtons">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse50"><span class="glyphicon glyphicon-chevron-down"></span>Guitar Tabs</a>
									</h4>
								</div>
								<div id="collapse50" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><label for="1a"><input type="checkbox" id="1a"> Stairway To Heaven</label></li>
											<li><label for="1b"><input type="checkbox" id="1b"> Blackbird</label></li>
											<li><label for="1c"><input type="checkbox" id="1c"> Purple Haze</label></li>
											<li><label for="1d"><input type="checkbox" id="1d"> Yer Blues</label></li>
											<li><label for="1e"><input type="checkbox" id="1e"> Time</label></li>
											<li><label for="1f"><input type="checkbox" id="1f"> Freebird</label></li>
											<li><label for="1g"><input type="checkbox" id="1g"> Eruption</label></li>
											<li><label for="1h"><input type="checkbox" id="1h"> Comfortably Numb</label></li>
											<li><label for="1i"><input type="checkbox" id="1i"> Layla</label></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse51"><span class="glyphicon glyphicon-chevron-down"></span>Wish List</a>
									</h4>
								</div>
								<div id="collapse51" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><label for="2a"><input type="checkbox" id="2a"> Mad Men, Season 5</label></li>
											<li><label for="2b"><input type="checkbox" id="2b"> Breville BES870XL Barista Express ...</label></li>
											<li><label for="2c"><input type="checkbox" id="2c"> Led Zeppelin I (Deluxe CD Edition)</label></li>
											<li><label for="2d"><input type="checkbox" id="2d"> Apple iPad Air</label></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse52"><span class="glyphicon glyphicon-chevron-down"></span>Recipes</a>
									</h4>
								</div>
								<div id="collapse52" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><label for="3a"><input type="checkbox" id="3a"> Cake Recipes - Allrecipes.com</label></li>
											<li><label for="3b"><input type="checkbox" id="3b"> Creamy Egg Nog Recipe</label></li>
											<li><label for="3c"><input type="checkbox" id="3c"> How to Make Your Own Beer at Home</label></li>
											<li><label for="3d"><input type="checkbox" id="3d"> Healthy Homemade Bread Recipes</label></li>
											<li><label for="3e"><input type="checkbox" id="3e"> Scrumptious Apple Pie recipe from ...</label></li>
											<li><label for="3f"><input type="checkbox" id="3f"> Custards and Pudding Recipes</label></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse53"><span class="glyphicon glyphicon-chevron-down"></span>Facebook Shares</a>
									</h4>
								</div>
								<div id="collapse53" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><label for="4a"><input type="checkbox" id="4a"> Calories in peanut butter</label></li>
											<li><label for="4b"><input type="checkbox" id="4b"> Diet Tips From Jack LaLane</label></li>
											<li><label for="4c"><input type="checkbox" id="4c"> iTunes Store: Download Lose It</label>li>
											<li><label for="4d"><input type="checkbox" id="4d"> Urban Myths: Calorie Counting</label></li>
											<li><label for="4e"><input type="checkbox" id="4e"> Excercise Tips</label></li>
											<li><label for="4f"><input type="checkbox" id="4f"> 20 Minute Exercise Routines</label></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br /><br />

		<button type="submit" class="btn btn-primary">Recommend Content</button>
		<a href="http://shred2/main.php" class="btn btn-default fr">Cancel</a>
		
		</form>
	</div>

<?php
// Footers
require 'footer.php'; 
?>
