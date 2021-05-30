<?php
session_start();
//connect to db
$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");
$photogrammer=$_SESSION['nickname'];
$title = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'title'));
$description = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'description'));
$temp = filter_input(INPUT_POST, 'uploadfilesub');
if(isset($temp)){
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = 'photographs/';
    move_uploaded_file($filetmpname, '../'.$folder.$filename);
    $rating=0;
    $sql="INSERT INTO photo (title,photogrammer,photoname,dir,descr,rating) VALUES ('$title','$photogrammer','$filename','$folder$filename','$description','$rating')";
    $qry= mysqli_query($db, $sql);
    if($qry){
        $headerstr="location: ../photographer.php?nickname=$photogrammer";
        header($headerstr);
    }
    
}    