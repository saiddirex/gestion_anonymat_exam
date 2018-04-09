<?php 
include('welcomeAdmin.php');
?>

<html>
   <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   </head>
   
    <h1 align="center">Supprimer un compte </h1>
    <table cellspacing='15px' border='0px' align="center">
    <form action = 'supprimerParAdmin.php' method = 'post'>
    <tr>
        <td>Login du compte :</td><td> <input type = 'text' name = 'username'><p></td>
    </tr>
    <tr>
    	<td>Saisir votre mot de passe :</td><td> <input type = 'password' name='password1'><p></td>
    </tr>
    <tr>
    	<td>Confirmer votre mot de passe :</td><td> <input type = 'password' name='password2'><p></td>
    </tr>
    <tr>
    	
    	<td align="right"><input type = 'submit' value="Supprimer"></td>
    </tr>
    </form>
    </table>


</html>