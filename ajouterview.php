<?php

include("welcomeAdmin.php");
?>


<html>
   <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   </head>
   
    <h1 align="center">Ajouter un compte </h1>
    <table cellspacing='15px' border='0px' align="center">
    <form action = 'ajouter.php' method = 'post'>
    <tr>
        <td>Nom :</td><td> <input type = 'text' name = 'nom'><p></td>
    </tr>
    <tr>
    	<td>Prénom :</td><td> <input type = 'text' name = 'prenom'><p></td>
    </tr>
    <tr>
    	<td>Login :</td><td> <input type = 'text' name = 'username'><p></td>
    </tr>
    <tr>
    	<td>Mot de passe :</td><td> <input type = 'password' name='password1'><p></td>
    </tr>
    <tr>
    	<td>Confirmer le mot de passe :</td><td> <input type = 'password' name='password2'><p></td>
    </tr>
    <tr>
    	
    	<td align="right"><input type = 'submit' value="Ajouter" ></td>
    </tr>
    </form>
    </table>



</html>
