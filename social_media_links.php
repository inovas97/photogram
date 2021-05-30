<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Social Media Links</title>
        <link rel="stylesheet" href="css/login_register_style.css">
        <link rel="icon" href="assets/images/icon.png">
    </head>
    <body>
        <nav class="bar" > 
        <a href="index.php"><img class="logo" src="assets/images/logo.jpg"></a>
        </nav>
        <nav class="menu_bar">
            <ul class="menu_list">
                <li class="menu_item"><a href="index.php" >Home</a></li>			
            </ul>
        </nav>
        <form action="handlers/change_social.php" method="post"  autocomplete="off">
            <table class="login_objects">
                <tr><td class ="login_headline">Social media profile links</td></tr>
                <tr><td><input class="forms" type="text" name="fb" placeholder="Facebook"></td></tr>
                <tr><td><input class="forms" type="text" name="ig" placeholder="Instagram"></td></tr>
                <tr><td><input class="forms" type="text" name="gh" placeholder="GitHub"></td></tr>
                <tr><td><input class="forms" type="text" name="t" placeholder="Twitter"></td></tr>
                <tr><td><input class="forms" type="text" name="yt" placeholder="Youtube"></td></tr>
                <tr><td><input class="button" type="submit" name="change_button" value="Save"></td></tr>
                <?php
                session_start();
                $user = $_SESSION['nickname'];
                echo "<tr><td class ='upload_text'>Go back to your profile page <a href='photographer.php?nickname=$user'>here</a>.</td></tr>";
                ?>
            </table>
        </form>
    </body>
</html>