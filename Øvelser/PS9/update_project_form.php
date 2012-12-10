<?php
//Opret begyndelsen på et HTML dokument
include("../markup.php");
$title="Projektb&oslash;rs - Opdatering";
showHeader($title);
echo "<br>";

//Indhent formvariabel, der angiver hvilket projekt, der ønskes opdateret
$id=$_REQUEST['p_id'];

//Opret forbindelse til databasen
include("../mydb.php");
mydb_connect();

//Indhent relevante oplysninger om det projekt, der ønskes opdateret
$rows = mysql_query ("SELECT p_titel, p_tekst, admin_navn, admin_mail, admin_pass 
FROM projektbors WHERE p_id='$id'");
$row = mysql_fetch_array($rows);

//Udskriv brugergrænseflade - formular til indtastning af ændring 
echo "Velkommen <a href='mailto:" . $row[3] . "'>" . $row[2] . "</a>";
echo "<br>";
echo "Indtast dit password og dine &aelig;ndringer til projektteksten for projektet " 
. $row[0] . ": ";
echo "<br>";
echo "<form method='post' action='update_project.php'>
      <input type='hidden' name='p_id' value='$id'>
      <textarea name='ny_tekst' rows='10' cols='50'>" .
      $row[1] .
      "</textarea><br>
      <p>Password <input type='password' name='pass' value=''></p>
      <input type=submit value='Opdater projekttekst'";
      
//Afslut HTML dokument      
showFooter();
?>

