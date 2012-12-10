<html>
<head>
<title>Opgave B: Body Mass Index</title>
</head>
<body>
<h1>Udregn dit Body Mass Index</h1>
<?php
//Funktionen sikrer, at højde indtastes i meter.
function check_hoejde($hoejde) {
$pattern_hoejde='^[0-2][\.][0-9][0-9]$'; 
  if(ereg($pattern_hoejde, $hoejde) == 0) {
    echo "<p>HUSK: <br>
         Du skal angive din hoejde i meter med to decimaler.<br>
         Du skal bruge punktum før decimalerne, ikke komma.</p>";
    exit;
  }
}
//Funktionen sikrer, at vægt indtastes i kilo.
function check_vaegt($vaegt) {
$pattern_vaegt='^[1-9][0-9][0-9]?[\.][0-9][0-9]$';
  if(ereg($pattern_vaegt, $vaegt) == 0) {
    echo "<p>HUSK: <br> 
         Du skal angive din vaegt i kilo med to decimaler.<br>
         Du skal bruge punktum før decimalerne, ikke komma.</p>";
    exit;
  } 
}
//Indhent brugerens data fra formen.
$vaegt=$_REQUEST["weight"];
$hoejde=$_REQUEST["height"];

//Check, at vægt og højde er korrekt indtastet af bruger.
check_hoejde($hoejde);
check_vaegt($vaegt);

//Udregn BMI.
$BMI= $vaegt / ($hoejde * $hoejde);
$nyBMI = number_format($BMI, 2, ".", ",");

echo "<h3>Dit BMI er : " . $nyBMI . "</h3>";

if($nyBMI < 18.5) {
  echo "<h2> Konklusion: Du er undervaegtig.</h2>";
}
else if(25 < $BMI ) {
  echo "<h2> Konklusion: Du er overvaegtig.</h2>";
}
else {
  echo "<h2> Konklusion: Du har en normal vaegt.</h2>";
}
?>
<p><a href="bmi.html">Beregn nyt BMI?</a></p>
</body>
</html>

