<?php
include("head_cykle.php");
include("../mydb.php");

//Påbegynd opbygningen af HTML-koden
header_cykle("Vi Cykler Til Arbejde - Index", "Velkommen til hjemmesiden for 
                                               kampagnen: Vi cykler til arbejde");

//Opret forbindelse til databasen
mydb_connect();

//Indhent relevante data fra databasen

$results = mysql_query("SELECT cid, name FROM companies");

echo "<p>Kampagnen er blevet til i et samarbejde mellem Sundhedsministeriet,
      Miljøministeriet og Arbejdsministeriet. Kampagnen bliver derudover 
      sponsoreret af EU's fond for sundhed i arbejdslivet samt en lang række 
      danske virksomheder.</p> 
      <br />
      <br />
      <h2> Oversigt over deltagende arbejdspladser</h2>
      <table border='1'>
      <tr>
      <th><b>Kilometer</b></th><th><b>Arbejdsplads</b></th>
      </tr>";  
      while ($result = mysql_fetch_row($results)) {
        echo "<tr>
              <td>";
              $rows = mysql_query("SELECT companies.cid, SUM(distance) AS total
                                   FROM users, companies, trips
                                   WHERE users.uid = trips.uid
                                   AND users.cid = companies.cid
                                   AND companies.cid = $result[0]
                                   GROUP BY companies.cid, users.cid");
              $row = mysql_fetch_row($rows);        
        echo $row[1] . " km 
              </td>
              <td><a href='company.php?cid=$result[0]'>$result[1]</a></td>
              </tr>";
        }
echo "</table>";
      
footer_cykle();

?>
