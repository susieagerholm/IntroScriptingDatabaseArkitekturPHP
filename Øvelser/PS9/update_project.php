<?php
include("../mydb.php");

//Indhent formvariable fra formularen til opdatering
$id=$_REQUEST['p_id'];
$tekst=$_REQUEST['ny_tekst'];
$pass=$_REQUEST['pass'];

//Bekræft validiteten af de indhentede formvariable
if (ereg('^[0-9]+$', $id) == 0) {
  exit();
}
//if (ereg('^[A-ZÆÅØa-zæøå0-9(),?!:;_\. \-]+$', $tekst) == 0) {
//  echo $tekst;
//  exit();
//}   

//Opret forbindelse til databasen
mydb_connect();

//Indhent password fra databasen og tjek, om det passer med det angivne password
$kodetemp = mysql_query("SELECT admin_pass FROM projektbors WHERE p_id='$id'");
$kode = mysql_fetch_array($kodetemp);
if($kode[0] != $pass) {
  echo "Du har indtastet forkert password";
  exit();
} 

//Opdater databasens oplysninger med den ønskede ændring 
mysql_query("UPDATE projektbors SET p_tekst='$tekst' WHERE p_id='$id'");

//Send brugeren tilbage til den opdaterede oversigt over projekter
header("Location: project.php");  

?>
