<?php
include("va_lib.php");
include("../mydb.php");

$pid=$_REQUEST['pid'];
$passwd=$_REQUEST['passwd'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];

//Tjek de indhentede formvariable

//Påbegynd opbygningen af HTML
va_header($pid, $passwd, 'Invite new user to VoteAboutIt.com');

echo "<form method='post' action='send_invitation.php'> 
      <input type='hidden' name='pid' value='$pid'>
      <input type='hidden' name='passwd' value='$passwd'>
      <table>
      <tr>
      <td>Navn: </td><td><input type='text' name='navn' size='30' value='$name'></td>
      </tr>
      <tr>
      <td>Email: </td><td><input type='text' name='email' size='30' value='$email'></td>
      </tr>
      </table>
      <input type='submit' value='Send'>
      </form>";
      
va_footer();
?>
