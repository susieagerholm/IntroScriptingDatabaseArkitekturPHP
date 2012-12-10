<?php
include("head_cykle.php");

//Indhent relevante formvariable
$cid=$_REQUEST['cid']; 

//Tjek de indhentede formvariable

//Påbegynd opbygningen af HTML
header_cykle("Vi Cykler Til Arbejde - Tilføj tur", "Tilføj tur");

//Opret formular til indtastning af data på turen

echo "<br>
      <form method='post' action='insert_trip.php'>
      <input type='hidden' name='cid' value='$cid'>
      
      <table>
      <tr>
      <td>Email</td><td><input type='text' name='email' size=30></td>
      </tr>
      <tr>
      <td>Adgangskode</td><td><input type='password' name='passwd' size=30></td> 
      </tr>
      <tr>
      <td>Antal kilometer</td><td><input type='text' name='km' size=30></td>
      </tr>
      </table>
      <br />
      <input type='submit' value='Tilføj tur'>
      <br />
      <br />
      <a href='index.php'>Tilbage til forsiden</a>";
      
footer_cykle();
?>
