<?php
include("va_lib.php");
include("../mydb.php");

//Indhent relevante formvariable
$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];

//Påbegynd opbygningen af HTML koden
va_header($pid, $passwd, "Index");

//Foretag de relevante forespørgsler til databasen
$rows = mysql_query("SELECT va_answer.qid, head, ans, name, email 
                     FROM va_question, va_person, va_answer 
                     WHERE va_answer.qid = va_question.qid 
                     AND va_answer.pid = $pid 
                     AND va_question.pid = va_person.pid");

echo "<table width=100%>
        <tr>
          <td><b>Inbox Questions</b></td><td><b>From</b></td><td><b>Action</b></td>
        </tr>";
        while ($row = mysql_fetch_row($rows)) {
          echo "<tr><td>$row[1]</td><td><a href=$row[4]>$row[3]</a></td><td>
          <a href='status.php?pid=$pid&passwd=$passwd&qid=$row[0]&head=$row[1]'>status</a>
          | <a href='answer.php?pid=$pid&passwd=$passwd&qid=$row[0]&ans=y'>YES</a> 
          | <a href='answer.php?pid=$pid&passwd=$passwd&qid=$row[0]&ans=n'>NO</a>
          </td></tr>";
        }
echo "<tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>
      <tr><td>           </td><td>               </td><td>            </td></tr>";

$rows1 = mysql_query("SELECT qid, head, pid, sent FROM va_question
                      WHERE pid=$pid");

echo "<tr>
        <td><b>Outbox Questions</b></td><td></td><td><b>Action</b></td>
      </tr>";
      while ($row1=mysql_fetch_row($rows1)) {
        echo "<tr>
              <td>$row1[1]</td>
              <td>        </td>
              <td><a href='votees.php?pid=$pid&passwd=$passwd&qid=$row1[0]&head=$row1[1]'>Votees</a>
              | <a href='delete_question.php?pid=$pid&passwd=$passwd&qid=$row1[0]'>Delete</a>
              | <a href='send.php?pid=$pid&passwd=$passwd&qid=$row1[0]'>Send</a>
              </td></tr>";
        }
echo "</table><br>

<form action='create_question.php'>
  <input type='hidden' name='pid' value='$pid'>
  <input type='hidden' name='passwd' value='$passwd'>
  <p><b>Ask a YES/NO-question</b></p>
  <input type='text' name='head' value='' size='50'>
  <input type='submit' value='Create Question'>
</form>";
  
va_footer();
?>
