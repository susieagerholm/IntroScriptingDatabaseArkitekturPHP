<html>
<head>
<title>Opgave C: Body Mass Index</title>
</head>
<body>
<h1>Udregn dit Body Mass Index</h1>
<?php
$hoejde=$_REQUEST["height"];
$hoejde_i_meter=$hoejde / 100;
$vaegt=$_REQUEST["weight"];

$BMI= $vaegt / ($hoejde_i_meter * $hoejde_i_meter);
$nyBMI = number_format($BMI, 2, ".", ",");

echo "<h3>Dit BMI er : " . $nyBMI . "</h3>";

if($nyBMI < 18.5) {
  echo "<h2> Konklusion: Du er underv&aelig;gtig.</h2>";
}
else if(25 < $BMI ) {
  echo "<h2> Konklusion: Du er overv&aelig;gtig.</h2>";
}
else {
  echo "<h2> Konklusion: Du har en normal v&aelig;gt.</h2>";
}
?>
<p><a href="bmi.html">Ny beregning?</a></p>
</body>
</html>

