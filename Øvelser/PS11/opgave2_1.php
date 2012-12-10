<?php

function gen_passwd() {
  $res = "";
  $index = 0; 
  while ($i < 4) {
    $new = rand(2,9);
    $res = $res . $new;
    $index++; 
  }
  return $res;
}
?>
