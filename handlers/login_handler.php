<?php
session_start();
//connect to db

$db = mysqli_connect('localhost','root','','pgdatabase') or die("could not connect to database");

//Register users
$nickname = mysqli_real_escape_string($db, filter_input(INPUT_POST, 'nickname'));
$password = mysqli_real_escape_string($db, filter_input(INPUT_POST,'password'));
if(empty($nickname)){$errors="Nickname is required"; header('location: login.php');}
else if(empty($password)){$errors="Password is required"; header('location: login.php');}
else{
    $user_check_query = "SELECT * FROM photogrammer WHERE nickname= '$nickname'";
    //check db for existing user with same nickname
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);
    if(!$user){
        $_SESSION["error"] = "nickname not found";
        header('location: ../login.php'); 
    }
    else if($user['passw']!=$password){
        $_SESSION["error"] = "password not match";
        header('location: ../login.php'); 
    }
    else{
        if (isset($_SESSION["error"])){
            unset($_SESSION["error"]);
        }
        $_SESSION["nickname"] = $nickname;
        $headerstr="location: ../index.php";
        header($headerstr);
    }
    
}