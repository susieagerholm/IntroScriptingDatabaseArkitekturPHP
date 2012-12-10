<?php

$pjs[0][0] = 1;
$pjs[0][1] = "Projector 1";
$pjs[1][0] = 2;
$pjs[1][1] = "Projector 2";
$pjs[2][0] = 3;
$pjs[2][1] = "Projector 3";

select_box($title, $pjs) {
$res = "<select name='$title' size='1'>\n";
        for( $i = 0; $i < count($pjs); $i++) {
        $id = $pjs[$i][0];
        $text = $pjs[$i][1];
        $res = $res . "<option name='id' value='$id'>'$text'</option>\n"
        }
        $res = $res . "</select>";
        return res;
}
?>
