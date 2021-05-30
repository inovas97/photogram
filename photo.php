<?php session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Photo</title>
        <link rel="stylesheet" href="css/photo_css.css">
        <link rel="icon" href="assets/images/icon.png">
    </head>
    <body>
        <?php 
        $title = filter_input(INPUT_GET,'title');
        $db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
        $photo_query = "SELECT * FROM photo WHERE title='$title'";
        $results = mysqli_query($db, $photo_query);
        $photo = mysqli_fetch_assoc($results)
        ?>
        <div class="photo_box"> 
            <?php 
            $dir = $photo['dir'];
            echo "<img class='photo' src='$dir' alt='Card image cap'>";
            ?>
            
            <nav class="comments_box">
                <h1 class="comments_title">Comments</h1>
                <ul class="comments">
                    
                </ul>
                <?php
                if(isset($_SESSION['nickname'])){
                    echo '<input type="text" id="new_comment" name="comment" placeholder="Add your comment..." autocomplete="off" required="">';
                    $body = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'comment'));
                    $user= filter_input(INPUT_GET,'user');
                    $title= filter_input(INPUT_GET,'title');
                    //$str="javascript:window.location='http://$host/project/add_comment.php?user=$user&title=$title&body='+document.getElementById('new_comment').value";
                    echo "<input type='submit' value='Submit'>";                   
                }
                ?>
            </nav>
            
            <nav class="photo_body">
                <div class="description">
                    <?php
                        echo '<h1 class="photo_title">"'.$title.'" by '.$photo['photogrammer'].'</h1>';
                        echo '<p class="photo_text">'.$photo['descr'].'</p>';
                    ?>
                    
                </div>
                <?php 
                if(isset($_SESSION['nickname'])){
                    echo '<div class="rating_body">';
                    echo '<h1 class="rating_text">Rate this photo</h1>';
                    echo '<fieldset class="rating">';
                    echo '<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome"></label>';
                    echo '<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good"></label>';
                    echo '<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh"></label>';
                    echo '<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad"></label>';
                    echo '<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Very bad"></label>';
                    echo '</fieldset>';
                    echo '</div>';
                }
                ?>
            </nav>
        </div>
    </body>
</html>
