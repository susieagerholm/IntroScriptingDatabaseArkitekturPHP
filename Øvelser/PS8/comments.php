<?php
include("../mydb.php");

//Funktion, der skriver formular til en ny kommentar
function echo_kommentar_form($url) { 
  echo "<p>Tilfoej en kommentar:</p>";
  echo "<form method='post' action='comments_add.php'>";
  echo "<input type='hidden' name='url' value='$url'>";
  echo "<input type='text' name='name' value='Navn'><br><br>";
  echo "<input type='text' name='email' value='Email'><br><br>";
  echo "<textarea name='text' rows='20' cols='30'><br><br>";
  echo "Skriv din mening her:";
  echo "</textarea>\n";
  echo "<input type='submit' value='Send'>";
  echo "</form>";
}
//Bekræft valid url-adresse - eller afslut script
$url = $_REQUEST['url'];
$pattern = '^[A-Za-z0-9:&/\?\.]+$';
if (ereg ($pattern, $url) == 0) {
  exit(); 
}
else mydb_connect();

//Foretage forespørgsel til databasen
$rows = mysql_query ("SELECT insertdate, email, name, text, id FROM comments WHERE url = '$url'");

//Loop gennem rækkerne
$comments = "";
while ($row = mysql_fetch_array($rows)) {
  // Tilknyt en ny kommentar til variablen $comments
  $comments = $comments . "<li>" . $row[2] . ": " . $row[3] . 
  " <a href=\"comment_delete_form.php?url=$url&id=$row[4]\">slet</a></li>\n";
}

//Returner side med kommentarer - eller angiv, hvis ingen kommentarer endnu 
if ($comments != "") {
  echo "<html><head><title>Kommentarer</title></head>";
  echo "<body><h1>Kommentarer</h1>\n";
  echo "<p>" . $comments . "</p>\n";
  echo_kommentar_form($url);
  echo "</body></html>";
}
else {
  echo "<html><head><title>Kommentarer</title></head>";
  echo "<body><h1>Kommentarer</h1>\n";
  echo "<p>Der er endnu ingen kommentarer til denne side</p>\n";
  echo_kommentar_form($url);
  echo "</body></html>";
}
?>
