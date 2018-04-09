<?php



include('session.php');
require('tracer.php');
echo '<html>';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
echo '</head>';


$tableSemestre = array("S1","S2","S3","S4","S5");

$requeteFiliere = "SELECT * FROM fillieres";
Tracer($requeteFiliere) ;
$resultFiliere = mysqli_query($db,$requeteFiliere);
$rowFiliere = mysqli_fetch_array($resultFiliere,MYSQLI_ASSOC);


if(count($rowFiliere)==0)
   echo "Aucune Filiére n'existe dans la base de données";

else
{
	echo "<body>";
	echo "<table cellspacing='15px' border='0px'>";
	echo "<form action='matieres.php' method='POST'>";
	echo "<tr>";
	echo "<td> Filière : </td>";
	echo "<td><select name='Filiere'>";
	echo "<option></option>";

while(count($rowFiliere)!=0)
{

	echo "<OPTION>".$rowFiliere['DesignationFilliere']."</OPTION>";

	$rowFiliere = mysqli_fetch_array($resultFiliere,MYSQLI_ASSOC);

}

echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td> Semestre : </td>";
echo "<td><select name='Semestre'>";
echo "<option></option>";

for ($i=0;$i<count($tableSemestre);$i++)
{
	echo "<OPTION>".$tableSemestre[$i]."</OPTION>";
}

echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td><input type='submit' name='Validerbtn' value='Valider' /></td>";
echo "</tr>";


if (isset($_POST['Validerbtn']))
{

	$Filiere = mysqli_real_escape_string($db,$_POST['Filiere']);
	$Semestre = mysqli_real_escape_string($db,$_POST['Semestre']);

	if(empty($Filiere)||empty($Semestre))
	{

		echo "vous devez choisir une filiere et un semestre ! " ;

	}

	else 
	{
		header("location:matieres.php");
	}
}
?>	