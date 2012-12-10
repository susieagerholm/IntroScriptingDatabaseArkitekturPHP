<?php
include("../mydb.php");

//Bekræft valid url-adresse - eller afslut script
$url = $_REQUEST['url'];
$pattern = '^[A-Za-z0-9:&/\?\.]+$';
if (ereg ($pattern, $url) == 0) {
  exit(); 
}
else mydb_connect();

//Foretage forespørgsel til databasen
$rows = mysql_query ("SELECT insertdate, email, name, text FROM comments WHERE url = '$url'");

//Loop gennem rækkerne
$comments = "";
while ($row = mysql_fetch_array($rows)) {
  // Tilknyt en ny kommentar til variablen $comments
  $comments = $comments . "<li>" . $row[2] . ": " . $row[3] . "</li>\n";
}

//Returner side med kommentarer - eller angiv, hvis ingen kommentarer endnu 
if ($comments != "") {
  echo "<html><head><title>Kommentarer</title></head>";
  echo "<body><h1>Kommentarer</h1>\n";
  echo "<p>" . $comments . "</p></body></html>";
}
else {
  echo "<html><head><title>Kommentarer</title></head>";
  echo "<body><h1>Kommentarer</h1>\n";
  echo "<p>Der er endnu ingen kommentarer til denne side</p></body></html>";
}
?>
