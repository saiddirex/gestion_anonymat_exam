<?php
include("session.php");
if($_SESSION['categorie'] == 'AD')
  include("Admin.php");
else
  include("viewUser.php");
?>

<html>
<h1 align="center">Modifier mon mot de passe</h1>
</br>
<table cellspacing='15px' border='0px' align="center">
    <form action = 'modifierMotPasse.php' method = 'post'>
    <tr>
    	<td> Mot de passe actuel :</td>
    	<td><input type = 'password' name = 'password1'></td>
    </tr>
    <tr>
    	<td>Nouveau mot de passe:</td>
    	<td><input type = 'password' name='password2'></td>
    </tr>
        <tr>
    	<td>Confirmer le nouveau mot de passe:</td>
    	<td><input type = 'password' name='password3'></td>
    </tr>
    </br>

    <tr>
    	<td></td>
    	<td align="right"><input type = 'submit'></td>
    </tr>
    </form>
    </table>




</html>