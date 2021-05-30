<?php
session_start();
//connect to db
$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
$photogrammer=$_SESSION['nickname'];
$temp = filter_input(INPUT_POST, 'change_button');
if(isset($temp)){
    $fb = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'fb'));
    $ig = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'ig'));
    $gh = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'gh'));
    $t = mysqli_real_escape_string($db, filter_input(INPUT_POST, 't'));
    $yt = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'yt'));
    if(!empty($fb)){
        $sql="UPDATE photogrammer SET fb='$fb' WHERE nickname='$photogrammer'";  
        $qry= mysqli_query($db, $sql);
    }
    if(!empty($ig)){
        $sql="UPDATE photogrammer SET insta='$ig' WHERE nickname='$photogrammer'";  
        $qry= mysqli_query($db, $sql);
    }
    if(!empty($gh)){
        $sql="UPDATE photogrammer SET git='$gh' WHERE nickname='$photogrammer'";  
        $qry= mysqli_query($db, $sql);
    }
    if(!empty($t)){
        $sql="UPDATE photogrammer SET twit='$t' WHERE nickname='$photogrammer'";  
        $qry= mysqli_query($db, $sql);
    }
    if(!empty($yt)){
        $sql="UPDATE photogrammer SET yout='$yt' WHERE nickname='$photogrammer'";  
        $qry= mysqli_query($db, $sql);
    }
    
    $headerstr="location: ../photographer.php?nickname=".$photogrammer;
    header($headerstr);
       
}