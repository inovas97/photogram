<?php
session_start();
if ( isset($_SESSION['nickname'])){
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/login_register_style.css">
        <link rel="icon" href="assets/images/icon.png">
    </head>
    <body>
	<nav class="bar">
    <a href="index.php"><img class="logo" src="assets/images/logo.jpg"></a>
	</nav>
	<nav class="menu_bar">
		<ul class="menu_list">
			<li class="menu_item"><a href="index.php" >Home</a></li>			
		</ul>
	</nav>
    <form action="handlers/login_handler.php" method="POST">
		<table class="login_objects">
			<tr><td class ="login_headline">Welcome back Photogramer! </td></tr>
            <tr><td><input class="forms" type="text" name="nickname" placeholder="Nickname" required="" autocomplete="off"></td></tr>
			<tr><td><input class="forms" type="password" name="password" placeholder="Password" required="" autocomplete="off"></td></tr>
			<tr><td><input class="button" type="submit" name="login_button" value="Sign In"></td></tr>
			<tr><td class ="register_text">Not a member yet? It is very simple! Sign up <a href="register.php">here</a>.</td></tr>
            <?php
            if (isset($_SESSION['error'])){
                $error = $_SESSION["error"];
                echo "<tr><td class='error_message'>$error</td></tr>";
                unset($_SESSION["error"]);
            }  
            ?>
		</table>
	</form>
    </body>
</html>

