<?php
include("ds_lib.php");
include("../mydb.php");

//Indhent relevante formveriable fra login-siden
$email=$_REQUEST['email'];
$passwd=$_REQUEST['passwd'];

/Tjek at der er tale om velformede formvariable 

//Opret forbindelse til databasen
mydb_connect();

//Tjek, at der er oprettet en bruger med den kombination af email og password
$query = "SELECT mid, name 
         FROM Member 
         WHERE email='$email' AND password='$passwd'";

$rows = mysql_query($query);
  if ($row = mysql_fetch_row($rows)) {
    $mid = $row[0];
    $name = $row[1];
    $passwd = urlencode($passwd);
    header ("Location:index.php?mid=$mid&passwd=$passwd&name=$name");
  }
  else {
    $fejl="Fejl: Login mislykkedes!!!";
    pagehead($fejl, "");
    echo "<br />
          <p>Du har opgivet forkert password eller er ikke oprettet som bruger.<br />
          Tilbage til <a href='login.php'>log in?</a></p>";
  }

?>
