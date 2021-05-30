<?php
//connect to db
$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
$photogrammer_query = "SELECT * FROM photogrammer";
$results = mysqli_query($db, $photogrammer_query);
$count=0;
while($photogrammers = mysqli_fetch_assoc($results) and $count<4){
    echo '<li>';
    echo '<div class="photographer_box">';
    $image = mysqli_real_escape_string($db, $photogrammers['profile_pick_dir']);
    if ($image==null){
        $image="assets/images/default_profil.png";
    }
    echo "<img class='photographer' src='$image' alt='Card image cap'>";
    echo '<div class="photographer_body">';
    $nickname = mysqli_real_escape_string($db, $photogrammers['nickname']);
    echo "<h3 class='photographer_name'>$nickname</h3>";
    $description = mysqli_real_escape_string($db, $photogrammers['descr']);
    echo "<p class='photographer_description'>$description</p>";
    echo "<a href='photographer.php?nickname=$nickname'  class='photographer_details_button'>See all photos</a>";
    echo '</div>';
    echo '</div>';
    echo '</li>';
    $count++;
}
?>