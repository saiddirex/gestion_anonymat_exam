<?php

  include("welcomeAdmin.php");
?>

<html>
<h1 align="center">Mise à jour de la base de données </h1>
</br>
<table cellspacing='15px' border='0px' align="center">
    <form action = 'miseAjourBase.php' method = 'post'>
    <tr>
        <td> Confirmer le Mot de passe  :</td>
        <td><input type = 'password' name = 'password'></td>
    </tr>
    </br>

    <tr>
        <td></td>
        <td align="right"><input type = 'submit'></td>
    </tr>
    </form>
    </table>




</html>