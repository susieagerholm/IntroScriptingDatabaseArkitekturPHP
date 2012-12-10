<?php
function home_page($title, $body) {
  echo "<html>";
  echo "<head>";
  echo "<title>"; 
  echo $title;
  echo "</title>";
  echo "</head>";
  echo "<body>";
  echo $body;
  echo "</body>";
  echo "</html>";
}

function my_return_page($body) {
$now = date("Y-m-d H:i:s");
home_page("Dollarkursservice - $now", "<h2>Dollarkursservice</h2> $body");
}

$html = file_get_contents("http://www.valutakurser.dk");

$pattern = '<option value="([,0-9]+)" [a-zA-Z0-9="]*>Amerika ';

if(eregi ($pattern, $html, $dollarkurs)) {
  $dollarkurs = (double) "$dollarkurs[1]";
  echo $dollarkurs[1];
  $kroner = $dollarkurs;
  $ny_kroner = number_format($kroner, 2, ".", ",");
  $dollar = 100 / ($dollarkurs / 100);
  $ny_dollar = number_format($dollar, 2, ".", ",");

  my_return_page ("For \$100.00 f&aring;r du kr. " . $ny_kroner . "<br>
                   For kr. 100.00 f&aring;r du \$ " . $ny_dollar);
}
else {
  my_return_page("Servicen er ikke tilg&aelig;ngelig!<br>
                  Send mig venligst en <a href=\"mailto:saba@itu.dk\">email</a>.");
}

?>
