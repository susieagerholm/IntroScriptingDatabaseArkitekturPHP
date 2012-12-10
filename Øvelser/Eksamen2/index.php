<?php
include ("ds_lib.php");
include ("../mydb.php");

//Indhent relevante formvariable
$mid=$_REQUEST['mid'];
$passwd=$_REQUEST['passwd'];

//Tjek for velformede variable
checkpasswd($mid, $passwd);

//Opret forbindelse til db
mydb_connect ();

//Indhent den pågældende brugers navn til personalisering
$name = getmembername($mid, $passwd);

//Påbegynd opbygning af HTML
pagehead ("Diners’ Society", $name);

//Påbegyndt indledningen til tabellen
$tablestart =
"<table cellpadding=3 cellspacing=2 width=80% bgcolor=lightgrey>
<tr><td><b>Date</b></td><td><b>Time</b></td>
<td width=40%><b>Restaurant</b></td>
<td><b>Diners</b></td>";

echo "<h3>Future visits:</h3>
<form action=addvisit.php>
<input type=hidden name=mid value=$mid>
<input type=hidden name=passwd value=$passwd>
$tablestart <td><b>Action</b></td></tr>";

//Foretag forespørgsel til databasen om planlagte besøg
$futureQuery = "SELECT Visit.vid, date, time, restaurant, COUNT(mid) AS deltagere 
                FROM Visit LEFT JOIN Diner ON Visit.vid = Diner.vid 
                WHERE date > now() 
                GROUP BY Visit.vid 
                ORDER BY date, time";

//Løb rækkerne igennem i det indhentede resultat
$rows = mysql_query ($futureQuery);
while ($row = mysql_fetch_row ($rows)) {
$vid = $row [0];
$date = $row [1];
$time = $row [2];
$restaurant = $row [3];
$diners = $row [4];

//Indsæt de indhentede variable og færdiggør tabellen
echo "<tr>
<td>$date</td><td>$time</td><td>$restaurant</td>
<td align=center>$diners</td>
<td><a href='attend.php?vid=$vid&mid=$mid&passwd=$passwd'>Attend</a>
</td></tr>";
}
echo "<tr><td><input type=text name=date size=10></td>
<td><input type=text name=time size=5></td>
<td><input type=text name=rest size=20></td>
<td align=center>0</td>
<td><input type=submit value=’Add Visit’></td></tr>
</table></form>
<p>Enter dates in the format YYYY-MM-DD and times
in the format HH-MM (0-24 hours).</p>";

//Foretag forespørgsel til databasen om allerede afholdte besøg
$pastQuery = "SELECT Visit.vid, date, time, restaurant, 
              COUNT(mid) AS deltagere, AVG(rating) AS gennemsnit 
              FROM Visit LEFT JOIN Diner ON Visit.vid = Diner.vid 
              WHERE date < now() 
              GROUP BY Visit.vid 
              ORDER BY date, time";

$rows = mysql_query ($pastQuery);
  if ($row = mysql_fetch_row ($rows)) {
    echo "<h3>Past visits:</h3>
          $tablestart 
          <td><b>Rating</b></td><td><b>Action</b></td>";
    }
    
while ($row) {
$vid = $row [0];
$date = $row [1];
$time = $row [2];
$restaurant = $row [3];
$diners = $row [4];
$rating = $row [5];

echo "<tr>
      <td>$date</td><td>$time</td><td>$restaurant</td>
      <td align=center>$diners</td><td>$rating</td>
      <td><a href=’rate.php?vid=$vid&mid=$mid&passwd=$passwd’>Rate</a>
      </td>
      </tr>";
}

echo "</table>\n";

//Afslut opbygningen af HTML
pagefoot();
?>


