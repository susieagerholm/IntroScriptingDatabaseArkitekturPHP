<?php
//Opret begyndelse på et HTML dokument
include("../markup.php");
$title='Projektb&oslash;rs';
showHeader($title);
?>
<h1>Projektb&oslash;rs</h1>
<br>
<p><a href="form_new_project.html">[ Opret nyt projekt ]</a></p>
<br>

<?php
//Opret forbindelse til databasen
include("../mydb.php");
mydb_connect();

//Foretag forespørgsel til databasen 
$rows = mysql_query ("SELECT p_id, p_titel, p_tekst, admin_navn, admin_mail, admin_pass FROM
projektbors");

//Påbegynd udskrivning af tabel
  echo "<table border='1'>";

//Loop gennem rækkerne og udskriv de indhentede oplysninger om projekter
while ($row = mysql_fetch_array($rows)) {
  echo "<tr><th>" . $row[1] . "</th><th> Vedligeholdes af: <a href='mailto:" . $row[4] . "'>" 
       . $row[3] . "</a></th><th>" . $row[2] . "</th>
       <th><a href='update_project_form.php?p_id=$row[0]'> Opdater</a></th></tr>";
}

//Afslut udskrivning af tabel
  echo "</table>";

//Afslut HTML dokument
showFooter();
?>
