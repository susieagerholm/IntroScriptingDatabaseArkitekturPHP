<?php
include("../mydb.php");

//Indhent relevante formvariable
$cid=$_REQUEST['cid']; 
$email=$_REQUEST['email'];
$passwd=$_REQUEST['passwd'];
$km=$_REQUEST['km'];

//Tjek de indhentede formvariable

//Opret forbindelse til databasen
mydb_connect();

//Tjek, at brugeren er oprettet i databasen
$tjek= mysql_query("SELECT uid, name, email, passwd FROM users 
                    WHERE email = '$email'");

$tjek_pass = mysql_fetch_row($tjek);
                    
if (!$tjek) {
  echo "Du er ikke oprettet som bruger af Vi-cykler-til-arbejde.dk";
  exit();
}

if ($passwd != $tjek_pass[3]) {
  echo "Du har opgivet en forkert adgangskode";
  exit();
} 

$insert = mysql_query("INSERT INTO trips (uid, distance, tripdate)
VALUES ($tjek_pass[0], $km, now())");

if (!$insert) {
  echo "Turen kunne desværre ikke indsættes i databasen";
  exit();
}

header("Location: company.php?cid=$cid");
?>
