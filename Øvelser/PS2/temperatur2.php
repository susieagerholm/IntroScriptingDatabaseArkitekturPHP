<html>
<head><title>Temperatur-omregner</title>
</head>

<body>
<h1>Temperatur-omregner</h1>
<?php
$tempFahrenheit = $_REQUEST['fahrenheit'];
$tempCelcius = 5.0/9.0 * ($tempFahrenheit - 32.0);
echo "Temperaturen i Fahrenheit: " . $tempFahrenheit . " grader." . "<br>";
echo "Temperaturen i Celcius: " . $tempCelcius . " grader.";
?>
<p><a href="temperatur2.html">Ny beregning?</a></p>


