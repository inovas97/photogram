<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgdatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "CREATE TABLE IF NOT EXISTS photogrammer (
  nickname VARCHAR(30) NOT NULL PRIMARY KEY,email VARCHAR(200),
  passw VARCHAR(30) NOT NULL,profile_pick_dir VARCHAR(200),descr VARCHAR(200),fb VARCHAR(200),
  insta VARCHAR(200), git VARCHAR(200), twit  VARCHAR(200), yout  VARCHAR(200))";
  
if ($conn->query($sql) === TRUE) {
  echo "Table photogrammer created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS photo (
  title VARCHAR(30) NOT NULL PRIMARY KEY,photogrammer VARCHAR(200),
  photoname VARCHAR(30) NOT NULL,dir VARCHAR(200),descr VARCHAR(200),rating FLOAT
  )";
  
if ($conn->query($sql) === TRUE) {
  echo "Table photo created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


?>