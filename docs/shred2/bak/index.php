<?php
// ShredFeed index.php

// Functions 
require 'sql.php';
require 'functions.php';

// Headers
require 'header.php';
require 'fb.php';
require 'sidebar_index.php';

// Main
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

                <h2>
                        <span class="fr">
                                <a href="#">Friends</a> | 
                                <strong>Everyone</strong> |
                                <select>
                                        <option selected>Show Everything</option>
                                        <option>Web Pages</option>
                                        <option>Videos</option>
                                        <option>Pictures</option>
                                        <option>Documents</option>
                                </select>
                        </span>
                        The Latest Shreds <span style="color:red">(DEPRECATED)</span>
                </h2>

<?php
//sqlStart();
        //sqlQuery("SELECT * FROM $main_table ORDER BY ID DESC");

        $sql = "SELECT * FROM $main_table ORDER BY ID DESC";
        $result = mysql_query($sql) or die(mysql_error());

        if ($result)
        {
                while($row = mysql_fetch_array($result))
                {
                        $id = $row['ID'];
                        $date = $row['date'];
                        $title = $row['title'];
                        $folder = $row['folder'];
                        $user = $row['user'];
                        $uid = $row['uid'];
                        $url = $row['url'];
                        $fid = $row['extra'];
                        $type = $row['type'];
                        $snippet = $row['snippet'];

                        // MySQL
                        $mysql = "SELECT * FROM $user_table WHERE uid=$uid";
                        $output = mysql_query($mysql) or die(mysql_error());

                        if ($output)
                        {
                                // Assign Vars
                                $out = mysql_fetch_array($output);

                                $ushred_id = $out['ID'];
                                $ushred_date = $out['date'];
                                $ushred_uid = $out['uid'];
                                $ushred_name = $out['user'];
                                $ushred_img = $out['imgUrl'];
                        }
                        else
                        {
                                // Failure
                        }

                        $Sfid = $folder . $_SESSION["uid"];

                        echo"
                                <!-- Start Shred-->
                                <div class=\"tabLatest mb15\">
                                <!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                                <!-- <a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a> -->
                                <a href=\"#\"><img src=\"http://graph.facebook.com/" . $uid . "/picture\" class=\"fl mr15 pic\" /></a>
                                <div class=\"result\">
                                <h3><a href=\"http://howlix.com/shred2/post.php?id=$id\" class=\"black title\"> " . $title . " </a></h3> <!--Title-->
                                <p class=\"snippet\"> " . $snippet . " </p>
                                <p><small>added by " . $ushred_name . " at " . $date . " &bull; <a href=\" " . $url . " \" target=\"_new\"> " . $url . " </a> &bull; <a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "&squawk=" . $Sfid . "\"> " . $folder . "</a></small></p>
                                </div>
                                </div>
                                <!-- End Shred -->
                                <hr />
                        ";
                }
        }
        else
        {
                // Nothing
        }


sqlEnd();
?>

</div>

<p><span style="color:red">(DEPRECATED) NOTES:</span></p>
<p><span style="color:red">To be replaced with new landing page</span></p>

<?php
// Footers
require 'footer.php'; 
?>
