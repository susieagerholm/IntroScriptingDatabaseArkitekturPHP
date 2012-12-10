<?php
function vp_return_page ($title, $body) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title><?php echo $title;?></title>
  </head>
  <style type="text/css">
  h1 {
    color: white;
  }
  table {
    background-color: black;
  }
  img {
    width: 191px;
    height: 50px;
  }
  </style>
  <body>
  <table width="100%">
    <tr>
      <td><h1>Video Projector Reservation System</h1></td>
      <td><img scr="itc_logo_black.PNG" alt="ITU logo"></td>
    </tr>
  </table>
<?php
echo $body;
?>
</body>
</html>
<?php
}  
?>
  
<?php

function select_box($proj_id, $pjs) {
  $res = "<select name='proj_id' size='1'>";
  for( $i = 0; $i < count($pjs); $i++) {
   $id = $pjs[$i][0];
   $text = $pjs[$i][1];
   $res = $res . "<option value='$id'>'$text'</option>";
  }
  $res = $res . "</select>";
  return $res;
}

?>
