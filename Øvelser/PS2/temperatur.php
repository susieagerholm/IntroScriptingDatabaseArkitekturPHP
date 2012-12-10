<html>
<head><title>Temperaturservice</title>
</head>

<body>
<h1>Fahrenheit omregnet til Celcius</h1>

<?php
$tempFahrenheit = 68;

$tempCelcius = 5.0/9.0 * ($tempFahrenheit - 32.0);
echo "Værdi i Fahrenheit: " . $tempFahrenheit . " grader<br>\n";
echo "Værdi i Celcius: " . $tempCelcius . " grader<br>\n";
?>

</body>
</html>