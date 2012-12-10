<?php
include("../mydb.php");

//Indhent relevante formvariable fra formularen
$head=$_REQUEST['head'];
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];

//Opret forbindelse til databasen og indhent de relevante oplysninger
mydb_connect();

//Indsæt det nyligt oprettede spørgsmål i databasen
if ($head != "") {
  mysql_query("INSERT INTO va_question (pid, head) VALUES ('$pid', '$head')");
  }
  else {
    echo "Du skal skrive dit spørgsmål i tekstboksen, før du trykker på Create Question.";
  }

//Diriger brugeren tilbage til index siden, der er opdateret med det stillede spørgsmål
header("Location: index.php?pid=$pid&passwd=$passwd");

?>
