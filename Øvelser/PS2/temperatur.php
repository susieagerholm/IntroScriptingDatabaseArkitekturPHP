<html>
<head><title>Temperaturservice</title>
</head>

<body>
<h1>Fahrenheit omregnet til Celcius</h1>

<?php
$tempFahrenheit = 68;

$tempCelcius = 5.0/9.0 * ($tempFahrenheit - 32.0);
echo "V�rdi i Fahrenheit: " . $tempFahrenheit . " grader<br>\n";
echo "V�rdi i Celcius: " . $tempCelcius . " grader<br>\n";
?>

</body>
</html>