<?php
include("../mydb.php");

//Test validitet af formvariablerne 'id', 'url' og 'password'
$url=$_REQUEST['url'];
$id=$_REQUEST['id'];
$password=$_REQUEST['password'];
if(ereg ('^[A-Za-z0-9:&/\?\.]+$', $url) == 0) {
  exit();
}
if(ereg ('^[0-9]+$', $id) == 0) {
  exit();
}

if($password != "Siouxie26") {
  echo "Det indtastede password er ikke korrekt!";
  exit();
}

//Det indtastede password er korrekt - forbind til databasen og slet kommentar 
mydb_connect();
mysql_query ("DELETE FROM comments WHERE id='$id'");

//Omdiriger brugeren til kommentar siden
header("Location: comments.php?url=$url");
?>
