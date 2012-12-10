<?php
ob_start();
include("../mydb.php");

//Indhent formvariable fra formularen
$title=$_REQUEST['titel'];
$name=$_REQUEST['navn'];
$mail=$_REQUEST['mail'];
$pass=$_REQUEST['pass'];
$text=$_REQUEST['tekst'];

//Bekræft validiteten af diverse formvariable 
ereg ('^[A-ZÆÅØa-zæøå0-9,?!:;-_\. ]+$', $title);
ereg ('^[A-ZÆØÅa-zæøå- ]+$', $name);
ereg ('^[a-zA-Z][0-9a-zA-Z\._]*@[0-9a-zA-Z\._]+$', $mail);
//ereg ( password??)
ereg ('^[A-ZÆÅØa-zæøå0-9,?!:;-_\. ]+$', $text);

//Opret forbindelse til databasen
mydb_connect();

//Indsæt en ny række i project tabellen
mysql_query ("INSERT INTO projektbors (p_titel, p_tekst, admin_navn, admin_mail, admin_pass)
VALUES ('$title', '$text', '$name', '$mail', '$pass')");

//Send brugeren tilbage til den opdaterede oversigt over projekter
header("Location: project.php");

ob_end_flush();
?>
