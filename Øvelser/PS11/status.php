<?php
include("va_lib.php");
include("../mydb.php");

//Indhent relevante formvariable
$qid=$_REQUEST['qid'];
$head=$_REQUEST['head']; 
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];

//Tjek validiteten af de indhentede formvariable

//Påbegynd opbygningen af HTML koden
va_header($pid, $passwd, "Status");

echo "<h3><b>Status for the question: " . $head . "</b></h3>"; 

//Opret forbindelse til databasen
mydb_connect();

$status_temp = mysql_query("SELECT COUNT(ans='y'), COUNT(ans='n'), COUNT(ans) FROM va_answer
                           WHERE qid=$qid");
                        
$status = mysql_fetch_array($status_temp);

echo "<ul>
      <li>Number of YES votes: " . $status[0] . "</li>  
      <li>Number of NO votes: " . $status[1] . "</li>
      <li>Out of a total of" . $status[2] . " votes.</li>  
      </ul>";                  

va_footer();

?>
