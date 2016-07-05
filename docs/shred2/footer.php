<div class="col-md-12" id="footer">
		<span class="fr">&copy; 2014, ShredFeed</span>
		<ul>
			<li><a href="#">About</a></li>
			<li><a href="#">Support</a></li>
		</ul>
	</div>
</div>



<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Share With Your Friends</h4>
			</div>
			<div class="modal-body">
				<small>Select friends to share ShredFeed with.</small><br /><br />
				<ul class="fbList">
					<li>
						<label for="page">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1/c73.31.391.391/484484_10151104907812289_880854735_n.jpg" class="fl" />
							<input type="checkbox" value="" id="page" class="fr">
							<strong>Jimmy Smith</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li>
						<label for="ono">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1/c33.33.414.414/p480x480/578455_961201065052_83263660_n.jpg" class="fl" />
							<input type="checkbox" value="" id="ono"  class="fr">
							<strong>John Johnson</strong>
							<div class="clear"></div>
						</label>
		            </li>
					<li>
						<label for="diddly">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1/c120.0.480.480/p480x480/1383938_10151784711648892_55257100_n.jpg" class="fl" />
							<input type="checkbox" value="" id="diddly"  class="fr">
							<strong>Bo Winklestein</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li>
						<label for="joplin">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1/c33.33.414.414/148886_10151056430352751_731841953_n.jpg" class="fl" />
							<input type="checkbox" value="" id="joplin"  class="fr">
							<strong>Janis Rosembaum</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li>
						<label for="halen">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1/c33.33.414.414/p480x480/577566_10100597633264943_1110428705_n.jpg" class="fl" />
							<input type="checkbox" value="" id="halen"  class="fr">
							<strong>Eddy von Humphries</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li class="inviteFB">
		            	<form action="searchResults.html" class="mt15">
							<input type="search" results="5" placeholder="search..." name="s">
						</form>
		            </li>
		        </ul>
		        <button type="button" class="btn btn-primary mt15" style="width:100%;" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Share This With Your Friends</button>
			</div>
			<div class="modal-body" style="padding: 5px; border: 1px solid #ddd; background: #f6f6f6;">
				<p class="mt15 ml15"><strong>Or share this on:</strong></p>
				<a href="#" title="Share on Facebook" class="shareButton fb_share"></a>
				<a href="#" title="Share on Twitter" class="shareButton t_share"></a>
				<a href="#" title="Share on Pinterest" class="shareButton p_share"></a>
				<a href="#" title="Send an Email" class="shareButton em_share"></a>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="inviteFriends">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Add content songs to their new ShredFeed</h4>
			</div>
			<div class="modal-body" id="suggestContent">
				<input type="search" results="5" placeholder="search your content ..." name="s">
				<br /><br />
				<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifty">
					          Guitar Tabs
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFifty" class="panel-collapse collapse">
					      <div class="panel-body">
					        <ul id="tabList">
								<li>
									<label for="box1"><span class="listIcons"><input type="checkbox" id="box1" /></span>
									Stairway To Heaven</label>
								</li>
								<li>
									<label for="box2"><span class="listIcons"><input type="checkbox" id="box2" /></span>
									Blackbird</label>
								</li>
								<li>
									<label for="box3"><span class="listIcons"><input type="checkbox" id="box3" /></span>
									Purple Haze</label>
								</li>
								<li>
									<label for="box4"><span class="listIcons"><input type="checkbox" id="box4" /></span>
									Yer Blues</label>
								</li>
								<li>
									<label for="box5"><span class="listIcons"><input type="checkbox" id="box5" /></span>
									Time</label>
								</li>
								<li>
									<label for="box6"><span class="listIcons"><input type="checkbox" id="box6" /></span>
									Freebird</label>
								</li>
								<li>
									<label for="box7"><span class="listIcons"><input type="checkbox" id="box7" /></span>
									Eruption</label>
								</li>
								<li>
									<label for="box8"><span class="listIcons"><input type="checkbox" id="box8" /></span>
									Comfortably Numb</label>
								</li>
								<li>
									<label for="box9"><span class="listIcons"><input type="checkbox" id="box9" /></span>
									Layla</label>
								</li>
							</ul>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiftyone">
					          Wish List
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFiftyone" class="panel-collapse collapse">
					      <div class="panel-body">
					        <ul id="tabList">
								<li>
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Mad Men, Season 5</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Breville BES870XL Barista Express Espresso Machine</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Led Zeppelin I (Deluxe CD Edition)</a>
								</li>
								<li class="lastLi">
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Apple iPad Air</a>
								</li>
							</ul>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiftytwo">
					          Cat Videos
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFiftytwo" class="panel-collapse collapse">
					      <div class="panel-body">
					        <ul id="tabList">
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Cake Recipes - Allrecipes.com</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Creamy Egg Nog Recipe</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">How to Make Your Own Beer at Home</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Healthy Homemade Bread Recipes</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Scrumptious Apple Pie recipe from ...</a>
								</li>
								<li class="lastLi">
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Custards and Pudding Recipes</a>
								</li>
							</ul>
					      </div>
					    </div>
					  </div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary mt15" style="width:100%;" data-dismiss="modal" data-box="myAlert" id="submitShred">Create Their ShredFeeds</button>
			</div>
		</div>
	</div>
</div>

<!--
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Content To </h4>
      </div>
      <div class="modal-body">
      	<!--<iframe id="iframeWIKI" height="500px" width="100%" frameborder="0" src="http://howlix.com/shred/real2/addFolder.php"></iframe>-->

		<form action="addContent.php" method="post">

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

		<input type="submit" class="btn btn-primary" value="Add" />
		<button type="button" class="btn btn-default fr">Cancel</button>
	</div>
	</form>	

      </div>
    </div>
  </div>
</div>
-->

</body>
</html>
