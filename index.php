<?php 
session_start();
if(array_key_exists('logout', $_POST)){
    unset($_SESSION['nickname']);
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Photogram</title>
        <link rel="stylesheet" href="css/index_style.css">
        <link rel="icon" href="assets/images/icon.png">
    </head>
    <body>
    <nav class="bar">
        <div>
            <a href="index.php"><img class="logo" src="assets/images/logo.jpg"></a>
        </div>
    </nav>
    <nav class="menu_bar">
        <ul class="menu_list">
        <?php
        if(isset($_SESSION['nickname'])){
            echo '<li class="menu_item"><a href="photographer.php?nickname='.$_SESSION['nickname'].'">'.$_SESSION['nickname'].'</a></li>';
            echo '<li class="menu_item"><form method="post">
                        <input type="submit" name="logout"class="button" value="Logout"/>
                    </form></li>';
        }
        else{
            echo '<li class="menu_item"><a href="login.php">Sign In</a></li>';
            echo '<li class="menu_item"><a href="register.php">Sign Up</a></li>';
        }
        ?>
        </ul>
    </nav>
    <nav class="header">
        <h1 class="h">Welcome to Photogram</h1>
        <p class="p">Here you can find the work of our talented photographers</p>
    </nav>
    <section class="photos">
        <div class="container">
            <div class="row">
                <div class="enjoy">
                    <h2>Enjoy the art</h2>
                </div>
            </div>
            <ul id="photo_list">
                <?php include('photo_list_view.php');?>
                
            </ul>
            <div class="link_all_photos">
                <a href="#" >View all photos</a>
            </div>
        </div>
    </section>
    <section class="photographers">
        <div class="photographers_container">
            <div class="row">
                <div class="photographers_text">
                    <h1 class="section-title">Meet our photographers</h1>
                </div>
            </div>
            <ul id="photographer_list">
                <?php include('photogrammer_list_view.php');?>
            </ul>
            <div class="link_all_photographers">
                <a href="#" >View all photogrammers</a>
            </div>
        </div>
    </section>
    <nav class="social_bar">
        <h3 class="h">Follow us on social media</h3>
        <div class ="social_media">
            <a href=""><img class ="fb" src ="assets/images/fb.png" title ="Facebook"></a>
            <a href=""><img class ="ig" src ="assets/images/ig.png" title ="Instagram"></a>
            <a href=""><img class ="gh" src ="assets/images/gh.png" title ="GitHub"></a>
            <a href=""><img class ="t" src ="assets/images/t.png" title ="Twitter"></a>
            <a href=""><img class ="yt" src ="assets/images/yt.png" title ="YouTube"></a>
        </div>
    </nav>
    <footer class="copyright_box_2">
        <div class="copyright">
            <h4 class="copyright_text">© 2019 photogram.com All Rights Reserved</h4>
        </div>
    </footer>
</body>
</html>
