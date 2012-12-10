<?php

function va_header($pid, $passwd, $head) {

//Tjek validiteten af de indhentede formvariable

//Opret forbindelse til databasen
  mydb_connect();

//Tjek, at der er tale om en autoriseret bruger - og find brugerens navn
  $query = "SELECT name FROM va_person WHERE pid=$pid and passwd='$passwd'";
  
  $rows = mysql_query($query);
  if ($rows) {
    $row = mysql_fetch_row($rows);
    $name = $row[0];
    echo "<html>
          <head>
          <title>VoteAboutIt.com</title>
          <style type='text/css'>
          #top {
            margin: 0px;
            padding: 0px;
            background: blue;
            height: 50px;
          }
          h1 {
            color: red;
            font: book antiqua;
          }
          </style>
          </head>  
          <body bgcolor='white'>
            <div id='top'>
            <table width=100%>
            <tr>
            <td align=left><h1><b>VoteAboutIt.com</b></h1></td>
            <td align=right><img src='vote1.PNG'></td>
            </tr>
            </table>
            </div>
            <h4><a href='index.php?pid=$pid&passwd=$passwd'>$name's Work Space</a>";
    if ($head != "") {
      echo " : $head";
    }
    echo "</h4><hr>";
  } else {
    echo "Couldn't authenticate user";
  }
}

function va_footer() {
  echo "<hr>
        <a href='mailto:webmaster@voteaboutit.com'>webmaster@voteaboutit.com</a>
        </body>
        </html>";
}

function email_body($pid, $passwd) {
  return " Hi there,
  
  You have been invited to answer a question at 
  VoteAboutIt.com. To answer the question, access 
  
  <a href='http://www.voteaboutit.com/index.php?pid=$pid&passwd=$passwd'>VoteAboutIt.com</a>
  
  Best Regards,
  
  A friend at VoteAboutIt.com";
}

function invitation_body($modtager, $afsender) {
  return " Hi " . $modtager . ", <br>
  
  You have been invited by " . $name . " to become a member of 
  VoteAboutIt.com. To sign up for membership, access 
  
  <a href='http://www.voteaboutit.com/sign_up.php'>VoteAboutIt.com</a>
  
  Best Regards,
  
  A friend at VoteAboutIt.com";
}

?>
