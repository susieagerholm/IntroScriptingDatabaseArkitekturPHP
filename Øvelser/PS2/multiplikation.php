<html>
<head>
<title>Opgave C: Multiplicer to tal med hinanden</title>
</head>

<body>
<h1>Multiplikationsservice for 3.klasse</h1>

<?php
$operandOne=$_REQUEST['operand1']; 
$operandTwo=$_REQUEST['operand2']; 

echo "Det f&oslash;rste tal, du indtastede, var: " . $operandOne . "<br>";
echo "Det andet tal, du indtastede, var: " . $operandTwo . "<br>";
echo "<br>";
echo "Resultatet af beregningen er: " . ($operandOne * $operandTwo);

?>

<p><a href="multiplikation.html">Nyt regnestykke?</a></p>
</body>

</html>