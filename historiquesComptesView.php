<?php
include("welcomeAdmin.php");
?>

<html>
<h1 align="center">Historiques d'état des comptes</h1>
</br>
<table cellspacing='15px' border='1px' align="center" width = '90%'>
    <form action = 'historiquesComptesView.php'>

    <thead>
    <tr>
    <th> id </th>
    <th> Login</th>
    <th> nom </th>
    <th> prénom</th>
    <th> derniére connexion</th>
    <th> date d'ajout</th>
    <th> date de suppression</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $requser = "SELECT * from users WHERE categorie = 'US'";
    $resultuser = mysqli_query($db,$requser);
    $rowuser = mysqli_fetch_array($resultuser,MYSQLI_ASSOC);
    while(count($rowuser)!=0)
    {
    	echo "<tr>";
    	echo "<td>".$rowuser['id']."</td>";
    	echo "<td>".$rowuser['username']."</td>";
    	echo "<td>".$rowuser['nom']."</td>";
    	echo "<td>".$rowuser['prenom']."</td>";
    	echo "<td>".$rowuser['derniere_connexion']."</td>";
    	echo "<td>".$rowuser['date_ajout']."</td>";
    	echo "<td>".$rowuser['date_suppression']."</td>";
    	echo "</tr>";
    	$rowuser = mysqli_fetch_array($resultuser,MYSQLI_ASSOC);
    }

    ?>
    </tbody>
    </form>
    </table>



</html>
