<?php
//include './tracer.php';

include("connexion.php");
function showProgress($semestre,$filiere) {
include("connexion.php");

		$query="SELECT etat, designationmatiere from matieres, modules, fillieres where matieres.nummodule=modules.nummodule and fillieres.numfilliere=modules.numfilliere and modules.semestre='$semestre'and fillieres.designationfilliere='$filiere'";
		//Tracer($query);

		$resultat = mysqli_query($db, $query);

?>
<center>
<table cellpadding='2'>
<tr>
<th> Matière </th>
<th> Progression </th>
</tr>

<?php

	while ($donnees = mysqli_fetch_assoc($resultat)) {
	if($donnees['etat']==0) {
		?> <tr> <td> <?php echo $donnees['designationmatiere'],": " ?> </td>  <td> <progress value="0"  max = "5" id="pourcentage"></progress> 0/5 </td> </tr>  <?php  ;
	
	} 
	if ($donnees['etat']==1) {
		?> <tr> <td> <?php echo $donnees['designationmatiere'],": " ?> </td>  <td> <progress value="1"  max = "5" id="pourcentage"></progress> 1/5 </td> </tr>  <?php  ;
		
	}
	if ($donnees['etat']==2) {
		?> <tr> <td> <?php echo $donnees['designationmatiere'],": " ?> </td>  <td> <progress value="2"  max = "5" id="pourcentage"></progress> 2/5 </td> </tr> </table> <?php  ;
	}
	if ($donnees['etat']==3) {
		?> <tr> <td> <?php echo $donnees['designationmatiere'],": " ?> </td>  <td> <progress value="3"  max = "5" id="pourcentage"></progress> 3/5 </td> </tr>  <?php  ;
	}
	if ($donnees['etat']==4) {
		?> <tr> <td> <?php echo $donnees['designationmatiere'],": " ?> </td>  <td> <progress value="4"  max = "5" id="pourcentage"></progress> 4/5 </td> </tr>  <?php  ;
	}
	if ($donnees['etat']==5) {
		?> <tr> <td> <?php echo $donnees['designationmatiere'],": " ?> </td>  <td> <progress value="5"  max = "5" id="pourcentage"></progress> 5/5 </td> </tr>  <?php  ;
	}
}
?>
</table> 
</center> <?php
	}