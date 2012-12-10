<?php
function mydb_one_field($select_kom) {
  $result = mysql_query("$select_kom");
  if (!$result) {
    error ("Der er en fejl i din SELECT-kommando " . $select_kom);
  }
  $first_row = mysql_fetch_row($result);
  if (!$first_row) {
    error ("Der er en fejl i din SELECT-kommando " . $select_kom);
  }
  return $first_row[0];
}

?>
