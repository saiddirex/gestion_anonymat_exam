<?php

  include("user.php");
?>

<html>
<h1 align="center">Supprimer mon compte</h1>
</br>
<table cellspacing='15px' border='0px' align="center">
    <form action = 'supprimerMonCompte.php' method = 'post'>
    <tr>
        <td> Mot de passe  :</td>
        <td><input type = 'password' name = 'password1'></td>
    </tr>
        <tr>
        <td>Confirmer mot de passe:</td>
        <td><input type = 'password' name='password2'></td>
    </tr>
    </br>

    <tr>
        <td></td>
        <td align="right"><input type = 'submit'></td>
    </tr>
    </form>
    </table>




</html>