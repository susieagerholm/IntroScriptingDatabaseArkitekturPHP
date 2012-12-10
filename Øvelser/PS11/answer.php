<?php
include("../mydb.php");

//Indhent de relevante formvariable
$qid=$_REQUEST['qid'];
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$ans=$_REQUEST['ans'];

//Tjek validiteten af de indhentede formvariable

//Opret forbindelse til databasen
mydb_connect();

//Tjek, at brugeren ikke allerede har besvaret pågældende spørgsmål
$tjek_temp = mysql_query("SELECT ans FROM va_answer 
                          WHERE qid = $qid AND pid = $pid");

$tjek = mysql_fetch_array($tjek_temp);
if ($tjek[0] != NULL) {
  echo "Du har allerede besvaret det pågældende spørgsmål!
        <a href='index.php?pid=3&passwd=9347'>Tilbage til forsiden</a>";
        exit();
}                         

//Indsæt det afgevne svar i databasen 
$insert = mysql_query("UPDATE va_answer SET ans = '$ans' 
                       WHERE qid = $qid AND pid = $pid");
if (!$insert) {
 echo "Dit svar kunne desværre ikke indsættes i databasen";
 exit();
}

//Omdiriger brugeren til index-siden
header("Location: index.php?pid=$pid&passwd=$passwd");
?>
