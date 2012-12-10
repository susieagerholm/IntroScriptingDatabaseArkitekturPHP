<?php
include("va_lib.php");

$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$name=$_REQUEST['name'];

//Påbegynd opbygningen af HTML
va_header($pid, $passwd, 'Invitationen er blevet afsendt');

//Besked til afsender
echo "Din invitation er blevet afsendt til " . $name;

//Afslut opbygningen af HTML
va_footer();
?>
