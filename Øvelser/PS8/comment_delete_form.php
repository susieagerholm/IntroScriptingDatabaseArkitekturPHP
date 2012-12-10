<?php
// Test validitet af formvariablerne 'id' og 'url'
$url=$_REQUEST['url'];
$id=$_REQUEST['id']; 
if (ereg ('^[A-Za-z0-9:&/\?\.]+$', $url) == 0) {
  exit();
}
if (ereg ('^[0-9]+$', $id) == 0) {
  exit();
}

// Returner en side med password formular til brugeren
echo "
  <html>
  <head><title>Password forespørgsel til kommentar service</title></head>
  <body bgcolor=white>
  <h2>Password forespoergsel</h2>
  Indtast administratorens password for at slette kommentar:
  <form action=comment_delete.php>
    <input type='password' name='password'>
    <input type='hidden' name='url' value='$url'>
    <input type='hidden' name='id' value='$id'>
    <input type='submit' value='Slet Kommentar'>
  </form>
  </body>
  </html>";
?>
