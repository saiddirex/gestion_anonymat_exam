<?php

  include("welcomeAdmin.php");
?>

<html>
<h1 align="center">Mode d'anonymat </h1>
</br>
<table cellspacing='15px' border='0px' align="center">
    <form action = 'choixAnonymat.php' method = 'post'>

    <tr>
    <td>Choisir le mode d'anonymat :</td>
        <td> <select name='choix'> 
        <option>choisir le mode d'anonymat : </option>
        <option value = "1">code basique</option>
        <option value = "2">code numérique en fonction du code étudiant</option>
        <option value = "3">code alpha-numérique en fonction du code étudiants</option>
        <option value = "4">code numérique en fonction du code étudiant et matière</option>
        <option value = "5">code alpha-numérique en fonction du code étudiants et matiére</option>

        </td>
    </tr>
    <tr>
        <td> Confirmer le Mot de passe  :</td>
        <td><input type = 'password' name = 'password'></td>
    </tr>
    </br>

    <tr>
        
        <td align="right"><input type = 'submit' name = 'Validerbtn' value="Valider"></td>
    </tr>
    </form>
    </table>




</html>