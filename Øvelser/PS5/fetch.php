<html>
<head>
<title>Opgave D: G&oslash;r det selv</title>
</head>
<body>
<h1>Susie's pollen-service</h1>
<?php
$content = file_get_contents("http://www.astma-allergi.dk/");
$pattern_bynke = "Bynke</font>[ _/'<>=a-z0-9]+<font class='cityrow_pollen'>([0-9]+)</font>";
$pattern_el = "El</font>[a-z0-9<>/'= ]+'cityrow_pollen'>([0-9]+)</font>";

if(eregi($pattern_bynke, $content, $result)) {
echo "<h2>Dagens tal for bynke: </h2>";
echo $result[1];
echo "<br>";
}
else {
echo "Pattern matcher ikke.";
}

if (eregi($pattern_el, $content, $result)) {
echo "<h2>Dagens tal for el: </h2>";
echo $result[1];
}
else {
echo "Pattern matcher ikke.";
}
?>
</body>
</html>
