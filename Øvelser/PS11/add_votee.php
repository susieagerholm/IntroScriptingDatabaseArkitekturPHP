<?php
include("../mydb.php"); 

$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$qid=$_REQUEST['qid'];
$head=$_REQUEST['head'];
$name=$_REQUEST['navn'];
$email=$_REQUEST['email'];

//Tjek de indhentede formvariable

//Opret forbindelse til databasen
mydb_connect();

//Tjek, om den pågældende person er oprettet som bruger i databasen
$oprettet_bruger = mysql_query("SELECT pid, name, email FROM va_person 
                             WHERE name='$name' AND email='$email'");

  if(mysql_num_rows($oprettet_bruger) == FALSE) {
    echo "Den pågældende person er ikke oprettet som bruger af VoteAboutIt.com<br>";
    echo "<a href='list_users.php?pid=$pid&passwd=$passwd'>Se en liste over oprettede 
          brugere på VoteAboutIt.com</a><br>";
    echo "<a href='invite_new_user.php?pid=$pid&passwd=$passwd&name=$name&email=$email'>
          Inviter en ny bruger til VoteAboutIt.com</a>";
    exit();
    }

$oprettet_bruger1 = mysql_fetch_array($oprettet_bruger);
$votee_pid = $oprettet_bruger1[0];
  
//Tjek, at den pågældende bruger ikke allerede er oprettet som votee til spørsmålet
$oprettet_votee = mysql_query("SELECT qid, pid FROM va_answer WHERE qid=$qid AND pid=$votee_pid");

  if(mysql_num_rows($oprettet_votee) == TRUE) {
    echo "Den pågældende bruger er allerede oprettet som votee til dette spørgsmål<br>";
    echo "<a href='votees.php?pid=$pid&passwd=$passwd&qid=$qid&head=$head'>
          Tilbage til oversigten over votees?</a>";
    exit();
  }
  
//Indsæt den nye vælger på listen over stemmeberettigede til det pågældende spørgsmål
$add_to_list = mysql_query("INSERT INTO va_answer (qid, pid) VALUES ($qid, $votee_pid)");
  if(!$add_to_list) {
    echo "Den pågældende bruger kunne ikke indsættes på listen over votees";
    echo "<a href='votees.php?pid=$pid&passwd=$passwd&qid=$qid&head=$head'>
          Tilbage til oversigten over votees?</a>";
    exit();
    }  

//Omdiriger brugeren til den opdaterede votees side
header("Location: votees.php?pid=$pid&passwd=$passwd&qid=$qid&head=$head");
?>
