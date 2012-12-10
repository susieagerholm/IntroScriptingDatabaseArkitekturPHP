<?php
include("../mydb.php");
include("vp.php");
include("../formvars.php");

$date= date("Y-m-d");

//Tjek, at værdien af den opgivne dato er valid.
vp_check_date($date);

//Brug funktionen substr() til at klippe år, måned og dag ud af funktionen date(), 
//sæt variablerne "$year", "$month", og "$day" for derefter at sætte variablerne 
//"$nextday" og "$prevday"
 
$year = substr($date, 0, 4);
$month = substr($date, 5, 2);
$day = substr($date, 8, 2);

$nextday = date("Y-m-d", mktime(0, 0, 0,$month, $day+1, $year));
$prevday = date("Y-m-d", mktime(0, 0, 0,$month, $day-1, $year));

mydb_connect();

//Indhent oplysninger om reservationer på den pågældende dato
$query = mysql_query("SELECT projector_id, vp_projector.name, person_id, vp_person.name, email 
FROM vp_reservation, vp_projector, vp_person WHERE res_date='$date' 
AND vp_person.id = vp_reservation.person_id 
AND vp_projector.id = vp_reservation.projector_id;");

$rows = mysql_query($query);
$reservations = "";
while ($row = mysql_fetch_row($rows)) {
  $reservations = $reservations . "<li>" . $row[1] . " - " . $row[3] . "</a></li>";
}

$reservations = $reservations . "<p>
  <li> <a href='res_add_form.php?date=$date'>Add reservation</a></li>";
  
vp_return_page ("Projector Reservations", 
"<h3>Projector Reservations for $date</h3> 
[ <a href='projector.php?date=$prevday'>Previous Day</a> ]                                              
[ <a href='projector.php?date=$nextday'>Next Day</a> ]
<ul>$reservations</ul>");                                               

?>
