<html>
<head>
<title>OPGAVE B: G&AElig;T ET TAL!</title>
<body>
<?php
function echo_gaet_form($tal) {
  echo "<form method='post' action='gaet_et_tal.php'>";
  echo "<input type='hidden' name='tal' value='$tal'>";
  echo "<p>Indtast dit g&aelig;t:</p>";
  echo "<input type='text' name='gaet' size='7'>";
  echo "<input type='submit' value='G&aelig;t'>";
  echo "</form>";
}

$gaet=$_REQUEST["gaet"];
$tal=$_REQUEST["tal"]; 
  
if ($tal == "") {
  //Variablen 'tal' er ikke sat! Generer tilfældigt
  //tal med funktionen rand og returner introduktionsside
  //med form til indtastning af gæt.
  $tal = rand(1, 99);
  echo "<h2>G&aelig;t et tal mellem 1 og 99!</h2>";
  echo_gaet_form($tal);
}
elseif ($tal > $gaet) {
  //Returner en side med en form til indtastning af et
  //nyt gæt og en besked om at gættet var for lille. 
  echo "<h2>Dit g&aelig;t var for lille. Pr&oslash;v igen!</h2><br>";
  echo_gaet_form($tal);
} 
elseif ($tal < $gaet) {
  //Returner en side med en form til indtastning af et 
  //nyt gæt og en besked om at gættet var for stort.
  echo "<h2>Dit g&aelig;t var for stort. Pr&oslash;v igen!</h2><br>";
  echo_gaet_form($tal);
}
else {
  //Returnerer en side med en lykønskning og et link til 
  //et nyt spil.
  echo "<h1><b>Tillykke, du g&aelig;ttede det rigtige tal</b></h1>";
  echo "<p><a href='gaet_et_tal.php'>G&aelig;t igen</a></p>";
}
?>
</body>
</html>