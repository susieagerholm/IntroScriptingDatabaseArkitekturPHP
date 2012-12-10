<?php

function va_chk_passwd($passwd) {
  if(!ereg('^[2-9][2-9][2-9][2-9]$', $passwd)) {
    echo "Du har oplyst et forkert password. Husk, et gyldigt password består af fire cifre";
    exit(); 
  } 
} 

?>
