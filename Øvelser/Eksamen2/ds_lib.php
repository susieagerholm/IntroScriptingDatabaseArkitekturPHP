<?php

function pagehead($title, $member_name) {
  echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
       <html>
       <head>
       <meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1250\">
       <meta name=\"generator\" content=\"PSPad editor, www.pspad.com\">
       <title>$title</title>
       <style type='text/css'>
       h1 {
            color: black; 
            background-color: blue;
          }
       </style>
       </head>
       <body>
       <img align=right src=champagne.gif>
       <h1 bgcolor=red>$title</h1>";
  if ($member_name != "") {
      echo "<p>" . $member_name . " is logged in.
           <a href='login.php'>Log out</a></p>";
      }
}

function pagefoot() {
echo "<hr />
         <table width=100%>
         <tr>
         <td align=left>
         <a href='http://www.DinersSociety.com'>Diners' Society Home</a>
         </td>
         <td align=right>
         <a href='mailto:webmaster@DinersSociety.com'>DinersSociety.com</a>
         </td>
         </tr>
         </table>
         </body>
         </html>"; 
}

function checkpasswd($mid, $passwd) {
  if (!ereg('^[a-z0-9][a-z0-9][a-z0-9]+$', $passwd)) {
    pagehead("Fejl: Forkert password", "");
    echo "<p>Du har indtastet et fejlagtigt password</p>";
    exit();
    }
  if(!ereg('^0|[1-9][0-9]*$', $mid)) {
    pagehead("Fejl: Du er ikke oprettet som bruger", "");
    echo "<p>Databasen kan ike genkende dine oplysninger</p>";
    exit();
  }
}

function getmembername($mid, $passwd) {
$rows = mysql_query("SELECT name FROM Member
                     WHERE mid=$mid AND password='$passwd'");
                     
  if ($row = mysql_fetch_row($rows)) {
    $name = $row[0];
    return $name; 
  }
  else {
  pagehead("Kunne ikke finde dit navn i databasen", "");
  echo "<p>Databasen kan ikke genkende dine oplysninger</p>";
  exit();    
  }
}

?>
