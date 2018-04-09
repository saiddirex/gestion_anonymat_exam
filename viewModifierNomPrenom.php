<?php
include("session.php");
if($_SESSION['categorie'] == 'AD')
  include("Admin.php");
else
  include("viewUser.php");
?>

<html>
<h1 align="center">Modifier nom/prenom </h1>
</br>
<table cellspacing='15px' border='0px' align="center">
    <form action = 'modifierNomPrenom.php' method = 'post'>
    <tr>
    	<td> Nouveau nom : </td>
    	<td><input type = 'text' name = 'nom'></td>
    </tr>
    <tr>
    	<td> Nouveau prénom : </td>
    	<td><input type = 'text' name='prenom'></td>
    </tr>
    </br>

    <tr>
    	<td></td>
    	<td align="right"><input type = 'submit'></td>
    </tr>
    </form>
    </table>




</html>