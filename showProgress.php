<?php
include("session.php");
if($_SESSION['categorie'] == 'AD')
  include("Admin.php");
else
  include("viewUser.php");
?>


<?php
include './functions.php';
include("connexion.php");
//include './tracer.php';

$queryDesignationFil="SELECT designationfilliere from fillieres";
$querySemestre = "SELECT distinct semestre from modules";

//Tracer($queryDesignationFil);
//Tracer($querySemestre);

	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>

	</head>
	<br />
	<body>
	<form>
	<center>
	<select name="Filiere">
	<option value="Choisissez une filière">Choisissez une filière</option>
	<?php 		$resultat = mysqli_query($db, $queryDesignationFil);
		while ($donnees = mysqli_fetch_assoc($resultat)) { 
			echo "<option value='".$donnees["designationfilliere"]."'>".$donnees["designationfilliere"]."</option>"; }
?>

	</select>


	<select name="Semestre">
	<option value="Choisissez un semestre">Choisissez un semestre</option>
	<?php 		$resultat = mysqli_query($db, $querySemestre);
		while ($donnees = mysqli_fetch_assoc($resultat)) { 
						echo "<option value='".$donnees["semestre"]."'>".$donnees["semestre"]."</option>"; }
?>

	</select>


	<input type="submit" value="valider">
	</center>
	<br />
	<br />

<?php
	

if(isset($_GET['Semestre']) && isset($_GET['Filiere'])) {
	showProgress($_GET['Semestre'],$_GET['Filiere']);
}
?>
</form>
	</body>

</html>

