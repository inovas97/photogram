<?php
session_start();
//connect to db
$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
$photogrammer=$_SESSION['nickname'];
$temp = filter_input(INPUT_POST, 'upload_descr');
$description = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'description'));
if(isset($temp)){
    $sql="UPDATE photogrammer SET descr='$description' WHERE nickname='$photogrammer'";
    $qry= mysqli_query($db, $sql);
    if($qry){
        $headerstr="location: ../photographer.php?nickname=".$photogrammer;
        header($headerstr);
    }
}
