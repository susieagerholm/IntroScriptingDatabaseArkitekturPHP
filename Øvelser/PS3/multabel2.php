<html>
<head>
<title>Opgave B: Omvendt multiplikationstabel</title>
<body>
<?php
$tal=$_REQUEST["operand"];
echo "<h1>" . $tal . "-tabellen:</h1>";
echo "<table border =\"1\">\n";
for($taeller = 10; $taeller >= 0; $taeller = $taeller - 1) {
  echo "<tr>\n";
  $result = $taeller * $tal;
  echo "<td>" . $taeller . " gange " . $tal . " er " . $result . "<br></td>\n";
  echo "</tr>\n";
  }
?>
</body>
</html>
