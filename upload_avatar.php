<!DOCTYPE html>
<html>
    <head>
        <title>Upload Photo</title>
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
        <form action="handlers/add_profile_pick.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <table class="upload_objects">
                <tr><td class ="upload_headline">Choose the photo you want to upload(300x250px)</td></tr>
                <tr>
                    <td class="buttons">
                        <div class="upload-btn-wrapper">
                            <div class="button">Choose photo</div>
                            <input type="file" name="uploadfile" required=""/>
                            <input class="button" type="submit" name="uploadfilesub" value="Upload"/>
                        </div> 
                    </td>
                </tr>
                <?php
                session_start();
                $user = $_SESSION['nickname'];
                echo "<tr><td class ='upload_text'>Go back to your profile page <a href='photographer.php?nickname=$user'>here</a>.</td></tr>";
                ?>
                
            </table>
               
        </form>
    </body>
</html>
