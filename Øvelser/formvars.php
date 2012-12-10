<?php

function chk_email ($email) {
  if(ereg('^[a-zA-Z][0-9a-zA-z\._]*@0-9a-zA-Z\.]+$', $email) == 0) {
    echo("Du skal indtaste en email-adresse");
  }
}

function chk_heltal ($tal) {
  if(ereg('^0|[1-9][0-9]*$', $tal) == 0) {
    echo("Du skal indtaste et tal");
  }
}

function vp_check_date($date) {
  if (ereg('^[0-2][0-9][0-9][0-9]-[0-1][0-9]-[0-3][0-9]$', $date) == 0) {
    echo("Der er en fejl i den indtastede dato");
    exit();
  } 
}

?>
