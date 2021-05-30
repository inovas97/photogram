<?php
session_start();
if (isset($_SESSION['nickname'])){
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/login_register_style.css">
        <link rel="icon" href="assets/images/icon.png">
    </head>
    <body>
	<nav class="bar" >
		<div>
			<a href="index.php"><img class="logo" src="assets/images/logo.jpg"></a>
		</div>
	</nav>
	<nav class="menu_bar">
		<ul class="menu_list">
			<li class="menu_item"><a href="index.php" >Home</a></li>				
		</ul>
	</nav>
    <form action="handlers/register_handler.php" method="post">
        <table class="register_objects">
            <tr><td class ="register_headline">Become a Photogrammer</td></tr>
            <tr><td><input class="forms" type="text" name="nickname" placeholder="Preferred nickname" autocomplete="off" required=""></td></tr>		
            <tr><td><input class="forms" type="email" name="email" placeholder="Your e-mail" autocomplete="off" required=""></td></tr>
            <tr><td><input class="forms" type="password" name="password" placeholder="Your password" autocomplete="off" required=""></td></tr>
            <tr><td><input class="forms" type="password" name="password2" placeholder="Re-enter your password" autocomplete="off" required=""></td></tr>
            <tr><td><input class="button" type="submit" name="pg_sign_up_button" value="Sign Up"></td></tr>
            <tr><td class ="login_text">Remembered your password? Go back to login page <a href="login.php">here</a>.</td></tr>
            <?php 
                if (isset($_SESSION['error'])){
                    $error = $_SESSION["error"];
                    unset($_SESSION["error"]);
                    echo "<tr><td class='error_message'>$error</td></tr>";
                }
            ?>
        </table>
    </form>
    </body>
</html>

