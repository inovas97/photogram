<?php
session_start();
//connect to db
$db= mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");

//Register users

$nickname = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'nickname'));
$password = mysqli_real_escape_string($db, filter_input(INPUT_POST,'password'));
$password2 = mysqli_real_escape_string($db, filter_input(INPUT_POST,'password2'));
$email = mysqli_real_escape_string($db, filter_input(INPUT_POST,'email'));

//form validation

if($password != $password2){
    $_SESSION["error"]= "password not match";
    header('location: ../register.php');
}
else{
    $user_check_query = "SELECT * FROM photogrammer WHERE nickname= '$nickname'";
    //check db for existing user with same nickname
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);
    if($user){
        if($user["nickname"]==$nickname){
            $_SESSION["error"]= "nickname is used";
            header('location: ../register.php'); 
        }
    }
    else{
        $query="INSERT INTO photogrammer (nickname,passw, email) VALUES ('$nickname','$password', '$email')";
        mysqli_query($db, $query);
        
        if (isset($_SESSION["error"])){
            unset($_SESSION["error"]);
        }
        $_SESSION["nickname"]= $nickname;
        $headerstr ="location: ../index.php"; 
        header($headerstr);
    }
}