<?php
session_start();
if(array_key_exists('logout', $_POST)) {
    unset($_SESSION['nickname']);
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Photographer</title>
		<link rel="stylesheet" href="css/photographer_css.css">
        <link rel="icon" href="assets/images/icon.png">
	</head>
	<body>
		<nav class="bar" >
        <a href="index.php"><img class="logo" src="assets/images/logo.jpg"></a>
		</nav>
		<nav class="menu_bar">
        <ul class="menu_list">
                    
            <?php
                $nickname = filter_input(INPUT_GET,'nickname');
                echo '<li class="menu_item"><a href="index.php">Home</a></li>';
                
                if(isset($_SESSION['nickname']) && $nickname==$_SESSION['nickname']){
                    echo '<li class="menu_item">';
                    echo '<div class="dropdown">';
                    echo '<a class="dropbtn">Edit Profile</a>';
                    echo '<div class="dropdown-content">';
                    echo '<a class="dropdown_item" href="upload_avatar.php">Change Profile Picture</a>';
                    echo '<a class="dropdown_item" href="photogrammer_description.php"> Change Personal Description</a>';
                    echo '<a class="dropdown_item" href="social_media_links.php"> Update Social Media Links</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';
                    echo '<li class="menu_item"><a href="upload_photo.php">Upload Photo</a></li>';
                    echo '<li class="menu_item"><form method="post">
                            <input type="submit" name="logout"class="button" value="Logout"/>
                            </form></li>';
                }
            ?>
        </ul>
		</nav>
		<div class="photographer_header">
                    
        <?php
            echo '<h1 class="photographer_name">'.$nickname.'\'s portfolio</h1>';
            //connect to db
            $db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
            $sql_desc = "SELECT * FROM photogrammer WHERE nickname='$nickname'";
            $db_results = mysqli_query($db, $sql_desc);
            $photogrammer = mysqli_fetch_assoc($db_results);
            if($photogrammer['profile_pick_dir']==null){
                echo '<img class="photographer_icon" src="assets/images/default_profil.png" style="width:20%" alt="Card image cap">';
            }
            else{
                echo '<img class="photographer_icon" src="'.$photogrammer['profil_pick_dir'].'" alt="Card image cap">';
            }
            if($photogrammer['descr']==null){
                echo '<p class="photographer_description">Enter description...</p>';
            }
            else{
                echo '<p class="photographer_description">'.$photogrammer['descr'].'</p>';
            }
            echo '<div class ="social_media">';
            echo '<a href="'.$photogrammer['fb'].'"><img class ="fb" src ="assets/images/fb.png" title ="Facebook"></a>';
            echo '<a href="'.$photogrammer['insta'].'"><img class ="ig" src ="assets/images/ig.png" title ="Instagram"></a>';
            echo '<a href="'.$photogrammer['git'].'"><img class ="gh" src ="assets/images/gh.png" title ="GitHub"></a>';   
            echo '<a href="'.$photogrammer['twit'].'"><img class ="t" src ="assets/images/t.png" title ="Twitter"></a>';
            echo '<a href="'.$photogrammer['yout'].'"><img class ="yt" src ="assets/images/yt.png" title ="YouTube"></a>';
            echo '</div>';  
        ?>	
		</div>
		<div class="row">
        <?php
            $photos_sql = "SELECT * FROM photo WHERE photogrammer='$nickname'";
            $photos_results = mysqli_query($db, $photos_sql);
            while ($photo = mysqli_fetch_assoc($photos_results)){
                echo '<div class="column">';
                $src_photo = $photo['dir'];
                echo "<a href='$src_photo' target='_blank'><img src='$src_photo' style='width:100%'></a>";
                echo '</div>';
            }
        ?>
		</div>
	</body>
</html>
