<?php
include("ds_lib.php");
include("../mydb.php");

pagehead ("Log into Diners' Society", "");

echo "<br />
      <br />
      <h2>Please enter email and password to log into Diners Society.</h2>
      <form method='post' action='dologin.php'>
      <table>
      <tr>
      <td>Email:</td><td><input type='text' name='email' size='20'></td>
      </tr>
      <tr>
      <td>Password:</td><td><input type='password' name='passwd'></td>
      </tr>
      <tr>
      <td></td><td><input type='submit' value='Log in'></td>
      </tr>
      </table>
      </form>";

pagefoot ("", "");

?>
