<?php
include("../mydb.php");

//Indhent relevante formvariable fra formularen
$qid=$_REQUEST['qid'];
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];

//Opret forbindelse til databasen og indhent de relevante oplysninger
mydb_connect();

//Slet det pågældende spørgsmål fra databasen
$result = mysql_query("DELETE FROM va_question WHERE qid = $qid");
  if (!$result) {
    echo "Det pågældende spørgsmål kunne ikke slettes fra databasen";
    exit();
  }

//Diriger brugeren tilbage til index siden, der er opdateret med det stillede spørgsmål
header("Location: index.php?pid=3&passwd=9347");

?>
