<?php
include("../mydb.php");
include("va_lib.php");
include("../formvars.php");

$qid=$_REQUEST['qid'];
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];

//Tjek udformningen af relevante formvariable

//Påbegynd opbygningen af HTML koden
va_header($pid, $passwd, "Sending Emails");

//Opret forbindelse til databasen
mydb_connect();

//Find de brugere i databasen, der står på spørgsmålets svarliste
$recipients = mysql_query("SELECT qid, va_answer.pid, email, name, passwd FROM va_answer, va_person
                           WHERE qid=$qid AND va_answer.pid = va_person.pid") 
                           OR DIE ('Error: '.mysql_error());

//Opbyg en besked til brugerne på svarlisten
$info = mysql_fetch_array($recipients);
$message = email_body($info[1], $info[4]);

$head_temp = mysql_query("SELECT head FROM va_question WHERE qid=$qid") 
                          OR DIE ('Error: '.mysql_error());
$head = mysql_fetch_row($head_temp);

//Udskriv listen med modtagerne af de afsendte mails 
echo "<ul>";
  while ($recipient = mysql_fetch_row($recipients)) {
    mail($recipient[2], $head[0], $message);
    echo "Sending email to: " . $recipient[3];
  }
echo "</ul>";

//Opdater spørgsmålets status
$opdater= mysql_query("UPDATE va_question SET sent=now()
                       WHERE qid=$qid AND pid=$pid");
if (!$opdater) {
  echo "Databasen kunne ikke registrere, at du har afsendt spørgsmålet";
  exit();
}

//Afslut opbygningen af HTML koden
va_footer();

?>
