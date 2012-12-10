<?php

function pagehead($title, $member_name) {
  echo "!DOC TYPE...
       <html>
       <head>
       <title>$title</title>
       </head>
       <body>
       <img src='itc_logo_black.png'>
       <h1>$title</h1>";
  if ($member_name != "") {
      echo "<p>" . $member_name . " is logged in.
           <a href='login.php'>Log out</a></p>";
      }
}

function pagefoot($mid, $passwd) {
    echo "<hr />
         <table width=100%>
         <tr>
         <td align='left'>";
    if (($mid != "") && ($passwd != "")) {
      echo "<a href='index.php?mid=$mid&passwd=$passwd'>Log in</a>";
    }
    else {
      echo "<a href='login.php>Log in</a>"
    }
    echo "</td>
         <td align='right'>
         <a href='mailto:webmaster@DinersSociety.com>DinersSociety.com'>
         </td>
         </tr>
         </table>
         </body>
         </html>"; 
}
?>
