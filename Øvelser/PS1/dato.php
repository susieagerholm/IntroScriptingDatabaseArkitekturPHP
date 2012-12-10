<html>
<head><title>Dato og tid med php script</title></head>
<body>
<p>Opgave C: Dato og tid med php script</p>

<?php
	echo "Datoen er:<br>";
	echo date("j");
	echo ". ";	
  echo date("M");
	echo ". ";	
  echo date("Y");
?>

<br /> 
<br />
  
<?php 
$b = time (); 
echo "Klokken er:<br>";
echo date("g:i A",$b) . "<br>"; 
?>

</body>
</html>