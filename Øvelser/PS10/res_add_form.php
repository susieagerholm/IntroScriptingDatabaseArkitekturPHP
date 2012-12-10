<?php
include("../mydb.php");
include("vp.php");

$date=$_REQUEST['date'];

//Tjek relevante formvariable (skal jeg bruge header() i stedet for error()?)
if(ereg('^[0-2][0-9][0-9][0-9]-[0-1][0-9]-[0-3][0-9]$', $date) == 0) {
  vp_return_page ("Fejl i dato", "<h1>Fejl i dato</h1>
                                  <p>Der er en fejl i den dato, du har angivet.</p>"); 
  exit();
}

//Opret forbindelse til databasen og foretag en forespørgsel på den pågældende dato
mydb_connect();

$query = "SELECT projector_id, person_id FROM vp_reservation WHERE date=$date";
$rows = mysql_query($query);

//Loop gennem rækkerne og hent id og navn for de forskellige projectorer
$i = 0;
while ($row = mysql_fetch_row($rows)) {
  $pjs[$i][0] = $row[0]; // id
  $pjs[$i][1] = $row[1]; // name
  $i ++;
}

//Brug funktionen selectbox() til at aflejre en selektionsbox i en variabel
$sel_box = select_box("proj_id", $pjs);

// Påbegynd konstruktion af HTML-side
vp_return_page("Add Projector Reservation", "<h1>Add Projector Reservation for " . $date . "</h1><br>
                                            <form method='post' action='res_add.php'>
                                            <input type='hidden' name='dato' value='$date'>
                                            <p>Email:</p>
                                            <input type='text' name='email' size='40' value=''><br> 
                                            <p>Password:</p>
                                            <input type='password' name='pass' size='40' value=''><br>
                                            <p>Choose a projector</p>
                                            . $sel_box .
                                            <input type='submit' value='Add Reservation'>
                                            </form>");
 
?>
