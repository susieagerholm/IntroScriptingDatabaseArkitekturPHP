<?php
include("../mydb.php");

$url=$_REQUEST['url'];
$text=$_REQUEST['text'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];

//Check validitet af diverse formvariable
ereg ('^[A-Za-z0-9:&/\?\.]+$', $url);
ereg ('^[A-Zֵֶ״a-zזרו0-9,?!:;-_\. ]+$', $text);
ereg ('^[A-Zֶ״ֵa-zזרו- ]+$', $name);
ereg ('^[a-zA-Z][0-9a-zA-Z\._]*@[0-9a-zA-Z\._]+$', $email);

//Opret forbindelse til databasen
mydb_connect();

//Indsזt en rזkke i kommentar-tabellen
mysql_query ("INSERT INTO comments (url, insertdate, name, email, text)
VALUES ('$url', now(), '$name', '$email', '$text')");

//Omdiriger brugeren til "Vis kommentarer" siden
header("Location: comments.php?url=$url");

?>