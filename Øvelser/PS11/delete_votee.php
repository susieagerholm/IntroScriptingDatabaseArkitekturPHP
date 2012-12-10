<?php
include("../mydb.php");

//Indhent de relevante formvariable
$qid=$_REQUEST['qid'];
$head=$_REQUEST['head'];
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$svarer_id=$_REQUEST['svarer_id'];

//Tjek validiteten af de indhentede formvariable

//Opret forbindelse til databasen
mydb_connect();

//Slet den pågældende bruger fra listen
$delete_answer = mysql_query("DELETE FROM va_answer WHERE qid = $qid AND pid = $svarer_id");
$delete_person = mysql_query("DELETE FROM va_person WHERE pid = $svarer_id");
  if ((!$delete_answer) || (!$delete_person)) {
    echo "Den pågældende bruger kunne ikke slettes fra listen.";
    exit();
  }

//Omdiriger brugeren til den opdaterede votees side
header("Location: votees.php?pid=$pid&passwd=$passwd&qid=$qid&head=$head");

?>
