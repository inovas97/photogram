<?php
session_start();
//connect to db
$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
$photogrammer=$_SESSION['nickname'];
$temp = filter_input(INPUT_POST, 'uploadfilesub');
if(isset($temp)){
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = 'profile_picks/';
    move_uploaded_file($filetmpname, '../'.$folder.$filename);
    $sql="UPDATE photogrammer SET profile_pick_dir='$folder$filename' WHERE nickname='$photogrammer'";
    $qry= mysqli_query($db, $sql);
    if($qry){
        $headerstr="location: ../photographer.php?nickname=".$photogrammer;
        header($headerstr);
    }
    
}