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

<div class="col-md-9" id="mainCol">
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

		<h2>Add Content To <?php
                        // GET
                        $folder_get = $_GET["folder"];
                        echo $folder_get;
                ?> </h2>
		
		<form action="contentNew.php" method="post">

		<input type="hidden" value="" name="foldername"></input>
	
		<p><strong>1. Import content from the following folders:</strong></p>
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
								<li><label for="2b"><input type="checkbox" id="2b"> Breville BES870XL Barista Express Espresso Machine</label></li>
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
								<li><label for="4c"><input type="checkbox" id="4c"> iTunes Store: Download Lose It</label></li>
								<li><label for="4d"><input type="checkbox" id="4d"> Urban Myths: Calorie Counting</label></li>
								<li><label for="4e"><input type="checkbox" id="4e"> Excercise Tips</label></li>
								<li><label for="4f"><input type="checkbox" id="4f"> 20 Minute Exercise Routines</label></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<hr />

		<p><strong>2. Add a URL to your new folder:</strong></p>
		<input type="text" name="url" placeholder="http://..." style="" class="form-control" />
		<!--<span class="glyphicon glyphicon-plus ml15"></span>-->

		<hr />

		<p><strong>3. Upload a file to your folder:</strong></p>
		<input type="file" name="fileupload" size="chars"> 

		<hr />
	
		<p><strong>4. Add a title:</strong></p>
		<input type="text" name="title" style="" class="form-control" />

		<hr />

		<p><strong>5. Add a description:</strong></p>
		<textarea type="text" class="form-control" name="snippet"></textarea>

		<hr />
		
		<p><strong>8. Select media type:</strong></p>
                <select name="type" class="form-control">
                        <option value="website">Website</option>
                        <option value="image">Image</option>
                        <option value="document">Document</option>
                        <option value="video">Video</option>
                </select>

		<hr />	

		<input type="submit" class="btn btn-primary" value="Add Content" />
		<button type="button" class="btn btn-default fr">Cancel</button>
	</div>
	</form>

<?php
// Footers
require 'footer.php'; 
?>
