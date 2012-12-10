<?php
include("va_lib.php");
include("../mydb.php");

$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];

//Påbegynd opbygningen af HTML
va_header($pid, $passwd, 'VoteAboutIt.com - list of users');

//Opret forbindelse til databasen og indhent de relevante oplysninger
mydb_connect();

//Indhent de registrede vælgere for det pågældende spørgsmål
$rows = mysql_query("SELECT name, email FROM va_person GROUP BY name"); 

//Kontroller, at det ønskede indhold bliver indhentet fra databasen
if (!$rows) {
  echo (mysql_error());
}
else {
      echo "<h3><b>List of users: </b></h3><br>
      <table width=100%>
        <tr>
          <td><b>Name</b></td><td><b>Email</b></td>
        </tr>";
      
      while ($row = mysql_fetch_row($rows)){
        echo "<tr>
                <td>$row[0]</td><td>$row[1]</td>
              </tr>";
      }
      echo "</table>";
}

va_footer();
?>
