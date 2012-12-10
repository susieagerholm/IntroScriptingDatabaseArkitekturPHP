<?php
function chk_modulo11($cpr) {
  $c1 = $cpr{0};
  $c2 = $cpr{1};
  $c3 = $cpr{2};
  $c4 = $cpr{3};
  $c5 = $cpr{4};
  $c6 = $cpr{5};
  $c7 = $cpr{7};
  $c8 = $cpr{8};
  $c9 = $cpr{9};
  $c10 = $cpr{10};
  
  $sum = ($c1*4) + ($c2*3) + ($c3*2) + ($c4*7) + ($c5*6) + ($c6*5) + ($c7*4) +
  ($c8*3) + ($c9*2) + ($c10*1);
  
  if (($sum % 11) == 0) {
    echo $cpr . " opfylder modulus 11 check.";
    echo "<br>";
    echo "<p><a href='cpr.html'>Indtaste nyt CPR-nummer?</a></p>";
  }
  else {
    echo $cpr . " opfylder <i>ikke</i> modulus 11 check.";
    echo "<br>";
    echo "<p><a href='cpr.html'>Indtaste nyt CPR-nummer?</a></p>";
  }
}  
$cpr1=$_REQUEST['cpr_nr'];
$pattern='[0-3][0-9][0-1][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9]';

if(ereg($pattern , $cpr1) == 0) {
  echo "<h2>FEJL:</h2><br>";
  echo "<p>Der er noget galt med indholdet eller formatet på det CPR-nummer,<br>
       du har indtastet.<br> 
       Husk, at de første seks tal angiver en dag, en måned og et årstal og <br>
       et korrekt indtastet CPR-nummer har en bindestreg inden de sidste fire tal.</p>";
  echo "<br>";
  echo "<p><a href='cpr.html'>Indtaste CPR-nummeret igen?</a></p>";
  exit;
} 

chk_modulo11($cpr1); 
  
?>
