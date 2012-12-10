<?php
include("head_cykle.php");
include("../mydb.php");

//Indhent relevante formvariable
$cid=$_REQUEST['cid']; 

//Tjek de indhentede formvariable

//Opret forbindelse til databasen
mydb_connect();

//Find navnet på pågældende virksomhed
$find_navn = mysql_query("SELECT name FROM companies
                          WHERE cid=$cid");
          
$navn = mysql_fetch_row($find_navn);

header_cykle("Vi Cykler Til Arbejde - Arbejdsplads", 
             "Kilometer pr ansat på arbejdspladsen " . $navn[0]);

//Find arbejdspladsens medarbejdere og deres respektive totaler
$find_medarbejdere = mysql_query("SELECT users.uid, users.name, 
                                  SUM(distance) as total
                                  FROM users, trips
                                  WHERE users.uid = trips.uid
                                  AND cid = $cid
                                  GROUP BY users.uid, users.name") 
                                  OR DIE ('Error: '.mysql_error());

echo "<br />
      <br />
      <table border='1'>
      <tr>
      <th>Kilometer</th><th>Navn</th>
      </tr>";

while ($medarbejder = mysql_fetch_row($find_medarbejdere)) {
  echo "<tr>
        <td> $medarbejder[2] </td> <td> $medarbejder[1] </td>
        </tr>";
}
            
echo "</table>
      <br />
      <a href='enter_trip.php?cid=$cid'>Tilføj tur</a>
      <br />
      <br />
      <a href='index.php'>Tilbage til forsiden</a>";
      
footer_cykle();

?>
