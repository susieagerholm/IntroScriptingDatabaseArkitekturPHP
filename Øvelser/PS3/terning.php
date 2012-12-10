<html>
<head>
<title>Terningeservice</title>
</head>
<body>
<?php
$sides=$_REQUEST["sider"];
if(($sides % 2) == 0) {
  echo "<h1>Og terningen ruller...</h1>";
  echo "<h2>Din terning har sl&aring;et tallet: " . rand(1, $sides) . "</h2>";
}
else {
  echo "<h2>Du har angivet tallet: " . $sides . "</h2>"; 
  echo " Men terninger med et ulige antal sider er s&aring; underlige.";
  echo " Pr&oslash;v igen med et lige tal!";
}
?>
<p><a href="terning.html">Ny terning?</a></p>
</body>
</html>
