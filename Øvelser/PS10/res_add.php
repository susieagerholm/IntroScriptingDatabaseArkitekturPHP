<?php
include ("../mydb.php");
include ("../formvars.php");

$date=$_REQUEST['dato'];
$person_id=$_REQUEST['er det nødvendigt?']
$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$projector_id=$_REQUEST['proj_id'];

//Tjek validitet af de indhentede formvariable
chk_email($email);
//chk_id($projector_id);

//Opret forbindelse til databasen
mydb_connect();

//Tjek, at den angivne email stammer fra en person, der er med i databasen
if (mysql_query("SELECT email FROM vp_person WHERE email=$email" == 0)) {
  vp_return_page("Ingen adgang", "<h1>Ingen adgang</h1>
                                  <p>Du er ikke autoriseret til at reservere 
                                  en video-projektør på ITU</p>");
  exit();
}

//Tjek, at det angivne password passer med den angivne email
$kode_temp = mysql_query("SELECT password FROM vp_person WHERE email=$email");
$kode = mysql_fetch_array($kode_temp);
if(kode[0] != $password) {
  vp_return_page("Forkert password", "<h1>Forkertpassword</h1>
                                      <p>Du har opgivet et forkert password!</p>");
  exit();
}  

//Indsæt reservationen i databasen
mysql_query("INSERT INTO vp_reservation (projector_id, person_id, res_date) VALUES 
($projector_id, $person_id, "$res_date")");

//Returner brugeren til den opdaterede side
header("Location: projector.php?date=res_date");
?>
