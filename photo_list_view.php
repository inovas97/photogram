<?php
//connect to db

$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
$photo_query = "SELECT * FROM photo";
$results = mysqli_query($db, $photo_query);
$count=0;
while($photo = mysqli_fetch_assoc($results) and $count<4){
    echo '<li>';
    echo '<div class="photo_box">';
    $dir = mysqli_real_escape_string($db, $photo['dir']);
    echo "<img class='photo' src='$dir' alt='Card image cap'>";
    echo '<div class="photo_body">';
    $name = mysqli_real_escape_string($db, $photo['title']);
    echo '<h3 class="photo_title">"'.$name.'" by '.$photo['photogrammer'].'</h3>';
    echo '<p class="photo_description">'.$photo['descr'].'</p>';
    $link = "photo.php?title=".$photo['title'];
    echo "<a href='$link' target='_blank' class='photo_details_button'>Open Photo</a>";
    echo '</div>';
    echo '</div>';
    echo '</li>';
    $count++;
}

