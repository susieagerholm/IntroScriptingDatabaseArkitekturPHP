<html>
<head>
<title>Opgave A: Multiplikationstabel</title>
</head>
<body>
<?php
$tal1=$_REQUEST["operand"];
function multabel($tal) {
echo "<h1>" . $tal . "-tabellen:</h1>";
echo "<table border =\"1\">\n";
for($taeller = 0; $taeller <= 10; $taeller = $taeller + 1) {
  echo "<tr>\n";
  $result = $taeller * $tal;
  echo "<td>" . $taeller . " gange " . $tal . " er " . $result . "<br></td>\n";
  echo "</tr>\n";
  }
}
multabel($tal1);
?>
</body>
</html>
