<?php
include("../mydb.php");
include("va_lib.php");
include("../formvars.php");

$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$name=$_REQUEST['navn'];
$email=$_REQUEST['email'];

//Tjek validiteten af de indhentede formvariable

//Opret forbindelse til databasen
mydb_connect();

//Indhent navnet på afsender af mailen
$afsender1 = mysql_query("SELECT name FROM va_person WHERE pid=$pid");
  if(mysql_num_rows($afsender1) == FALSE) {
  echo "Kunne ikke finde afsender i databasen";
  exit();
  }
  
$afsender2 = mysql_fetch_array($afsender1);
$afsender3 = $afsender2[0];

//Opbyg en besked, der inviterer personen til at blive bruger af VoteAboutIt.com
$message = invitation_body($name, $afsender3);

//Afsend mail til den pågældende person 
mail($email, "Invitation til VoteAboutIt.com", $message);

//Omdiriger brugeren til den opdaterede votees side
header("Location: bekraeft_invitation.php?pid=$pid&passwd=$passwd&name=$name");

?>
