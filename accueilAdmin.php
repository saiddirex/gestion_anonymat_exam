<?php
include("welcomeAdmin.php");
?>

<html>
<h1 align="center">Historiques des tâches</h1>
</br>
<table cellspacing='15px' border='1px' align="center" width = '90%'>
    <form action = 'historiquesComptesView.php'>

    <thead>
    <tr>
    <th> Username</th>
    <th> Tache</th>
    <th> Matiére </th>
    <th> Module</th>
    <th> Filiére</th>
    <th> Semestre</th>
    <th> Date de la tâche</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $requser = "SELECT * from historiques ";
    $resultuser = mysqli_query($db,$requser);
    $rowuser = mysqli_fetch_array($resultuser,MYSQLI_ASSOC);
    while(count($rowuser)!=0)
    {
    	echo "<tr>";
    	echo "<td>".$rowuser['username']."</td>";
    	echo "<td>".$rowuser['tache']."</td>";
    	echo "<td>".$rowuser['designation_matiere']."</td>";
    	echo "<td>".$rowuser['designation_module']."</td>";
    	echo "<td>".$rowuser['designation_filiere']."</td>";
    	echo "<td>".$rowuser['semestre']."</td>";
    	echo "<td>".$rowuser['date_de_la_tache']."</td>";
    	echo "</tr>";
    	$rowuser = mysqli_fetch_array($resultuser,MYSQLI_ASSOC);
    }

    ?>
    </tbody>
    </form>
    </table>



</html>