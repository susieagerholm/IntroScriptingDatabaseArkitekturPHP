<?php

//funktion til etablering af forbindelse til database
function mydb_connect() {
  $db = mysql_connect("siouxie.dk.mysql", "siouxie_dk", "ESxxn6wM");
  if($db == 0) {
    echo "Ingen forbindelse til databasen";
    exit();
  }
  $database = "siouxie_dk";
  if(mysql_select_db($database, $db) == 0) {
    echo "Kunne ikke vælge databasen: '$database'";
    exit();
  }
}
?>
