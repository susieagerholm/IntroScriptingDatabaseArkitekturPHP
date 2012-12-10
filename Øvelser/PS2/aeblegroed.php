<html>
<head>
<title>Opgave D: &Aelig;blegr&oslash;dsprogram</title>
</head>
<body>
<?php
$antal=$_REQUEST['guests'];
echo "<h1>&AElig;blegr&oslash;d for " . $antal . " personer</h1>";

echo "<h2>Ingredienser:</h2>";
echo "<ul>";
echo "<li>" . (2 * $antal) . " &aelig;bler, ";
echo "<li>" . (1 * $antal) . " spsk. sukker, ";
echo "<li>" . (0.5 * $antal) . " dl vand og ";
echo "<li>" . (1 * $antal) . " nip vanille. ";
echo "</ul>";
?>

<h2>Fremgangsm&aring;de:</h2>
<p>&AElig;blerne koges og moses sammen med sukkeret, vandet og vanillien.</p>

<p>Foretag en ny <a href="aeblegroed.html">beregning</a>.</p>

</body>
</html>