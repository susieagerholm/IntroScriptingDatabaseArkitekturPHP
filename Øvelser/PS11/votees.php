<?php
include("va_lib.php");
include("../mydb.php");

$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$qid=$_REQUEST['qid'];
$head=$_REQUEST['head'];

//Tjek de indhentede formvariable

//Påbegynd opbygningen af HTML
va_header($pid, $passwd, 'Votees');

//Opret forbindelse til databasen og indhent de relevante oplysninger
mydb_connect();

//Indhent de registrede vælgere for det pågældende spørgsmål
$rows = mysql_query("SELECT va_answer.pid, name, email FROM va_answer, va_person
                     WHERE va_answer.qid = $qid 
                     AND va_answer.pid = va_person.pid"); 

//Kontroller, at det ønskede indhold bliver indhentet fra databasen
if (!$rows) {
  echo (mysql_error());
}
else {
      echo "<h3><b>Voters for the question: " . $head . "</b></h3><br>
      <table width=100%>
        <tr>
          <td><b>Name</b></td><td><b>Email</b></td><td><b>Action</b></td>
        </tr>";
      
      while ($row = mysql_fetch_row($rows)){
        echo "<tr>
                <td>$row[1]</td><td>$row[2]</td><td><a href='delete_votee.php?
                pid=$pid&passwd=$passwd&qid=$qid&head=$head&svarer_id=$row[0]'>Delete</a></td>
              </tr>";
      }
      
echo "</table>
      <br>
      <form method='post' action='add_votee.php'>
      <input type='hidden' name='pid' value='$pid'>
      <input type='hidden' name='passwd' value='$passwd'>
      <input type='hidden' name='qid' value='$qid'>
      <input type='hidden' name='head' value='$head'>
      <h3>Would you like to add another voter to the list?</h3>
      Navn:
      <input type='text' name='navn' value='' size='30'><br>
      Email:
      <input type='text' name='email' value='' size='30'>
      <input type='submit' value='Add'>
      </form>";
}

va_footer();
?>
