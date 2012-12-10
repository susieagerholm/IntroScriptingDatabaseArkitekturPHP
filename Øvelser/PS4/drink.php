<html>
<head>
  <title>OPGAVE A: DRINK SERVER</title>
</head>
<body>
<h1>Velkommen til kollegiefesten!!!</h1>
<?php
$navn = array();
$navn[0] = "Bloody Mary";
$navn[1] = "Screwdriver";
$navn[2] = "Brandbil";
$navn[3] = "Long Island Ice Tea";
$navn[4] = "GT";

$indhold = array();
$indhold[0] = "<ul><li>Tomatjuice,</li> <li>Vodka,</li> <li>Tabascosovs,</li> 
<li>Worchestershiresovs,</li> <li>Sellerisalt</li></ul>";
$indhold[1] = "<ul><li>Vodka,</li> <li>Appelsinjuice</li></ul>";
$indhold[2] = "<ul><li>Jaegermeister,</li> <li>R&oslash;d sodavand</li></ul>";
$indhold[3] = "<ul><li>Vodka,</li> <li>Gin,</li> <li>Rom,</li> <li>Tequila,</li>
<li>Citronsaft,</li> <li>Cola</li></ul>";
$indhold[4] = "<ul><li>Gin,</li> <li>Tonic</li></ul>";

$result = rand(0, sizeof($navn) - 1);
echo "<h1>Du skal drikke en: " . $navn[$result] . "</h1><br><br>";

echo "<h2>En " . $navn[$result] . " indeholder f&oslash;lgende ingredienser: </h2><br>";
echo $indhold[$result];
?>
</body>
<html>