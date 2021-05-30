<!DOCTYPE html>
<html>
    <head>
        <title>Change description</title>
        <link rel="stylesheet" href="css/upload_styling.css">
	<link rel="icon" href="assets/images/icon.png">
    </head>
    <body>
        <nav class="bar" >
        <a href="index.php"><img class="logo" src="assets/images/logo.jpg"></a>
        </nav>
        <nav class="menu_bar">
            <ul class="menu_list">
            <li class="menu_item"><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <form action="handlers/change_desc.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <table class="upload_objects">
                <tr><td class ="upload_headline">Write something about yourself</td></tr>
                <?php
                    //connect to db
                    session_start();
                    $db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
                    $user = $_SESSION['nickname'];
                    $sql_desc = "SELECT * FROM photogrammer WHERE nickname='$user'";
                    $db_results = mysqli_query($db, $sql_desc);
                    $photogrammer = mysqli_fetch_assoc($db_results);
                    echo '<tr><td><input class="forms" type="text" name="description" value="'.$photogrammer['descr'].'" autocomplete="off"></td></tr>';
                    
                ?>
                
                <tr>
                    <td class="buttons">
                        <div class="upload-btn-wrapper">
                            <input class="button" type="submit" name="upload_descr" value="Upload"/>
                        </div> 
                    </td>
                </tr>
                
                <tr><td class ="upload_text">Go back to your profile page <a href="photographer.html">here</a>.</td></tr>
            </table>
               
        </form>
    </body>
</html>
