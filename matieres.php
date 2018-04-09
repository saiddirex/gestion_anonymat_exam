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

		$requetenumfiliere = "SELECT * FROM fillieres WHERE DesignationFilliere = '$Filiere' ";
		$resultNumFiliere = mysqli_query($db,$requetenumfiliere);
		$rowNumFiliere = mysqli_fetch_array($resultNumFiliere,MYSQLI_ASSOC);

		$numfiliere = $rowNumFiliere['NumFilliere'];

		$requeteMatiere = "SELECT * FROM modules INNER JOIN matieres ON modules.NumModule = matieres.NumModule WHERE numFilliere='$numfiliere' and Semestre = '$Semestre'";
		$resultMatiere = mysqli_query($db,$requeteMatiere);
		$rowMatiere = mysqli_fetch_array($resultMatiere,MYSQLI_ASSOC);

		if(count($rowMatiere)==0)
			echo "aucun matiere n'est dans la base de données !";
		
		else
		{
			echo "<table cellspacing='15px' border='1px'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th> Semestre : ".$Semestre."</th>";
			echo "<th> Filière : ".$Filiere." </th>";
			echo "</tr>";
			echo "</thead>";


			echo "<table cellspacing='0px' border='1px'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th> Module </th>";
			echo "<th> Matière </th>";
			echo "<th> Etat </th>";
			echo "<th> La liste des étudiants </th>";
			echo "<th> La liste des étudiants avec le Code Anonyme </th>";
			echo "<th> La liste indiquée au prof  </th>";
			echo "<th> Le fichier des notes </th>";
			echo "<th> Le fichier final </th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			echo "<tr>";

			while (count($rowMatiere)!=0)
			{

				echo "<tr>";
				echo "<td>".$rowMatiere['DesignationModule']."</td>";
				echo "<td>".$rowMatiere['DesignationMatiere']."</td>";
				echo "<td>".$rowMatiere['etat']."</td>";

				if ($rowMatiere['etat']==0)
				{
					
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier1" size="30">';
					echo '<input type="submit" name="upload1" value="Uploader">';
										echo "</p>";
					echo "</td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";
				}

				if ($rowMatiere['etat']==1)
				{
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier1" size="30">';
					echo '<input type="submit" name="upload1" value="Uploader">';
					echo "</p>";
					echo "</td>";
					echo "<td><input type='submit' name='Telecharger1' value='Telecharger' /></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td></td>";


				}


				if ($rowMatiere['etat']==2)
				{
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier1" size="30">';
					echo '<input type="submit" name="upload1" value="Uploader">';
					echo "</p>";
					echo "</td>";
					echo "<td><input type='submit' name='Telecharger1' value='Telecharger' /></td>";
					echo "<td><input type='submit' name='Telecharger2' value='Telecharger' /></td>";
					echo "<td></td>";
					echo "<td></td>";


				}

				if($rowMatiere['etat']==3)
				{
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier1" size="30">';
					echo '<input type="submit" name="upload1" value="Uploader">';
					echo "</p>";
					echo "</td>";
					echo "<td><input type='submit' name='Telecharger1' value='Telecharger' /></td>";
					echo "<td><input type='submit' name='Telecharger2' value='Telecharger' /></td>";
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier2" size="30">';
					echo '<input type="submit" name="upload2" value="Uploader">';
					echo "</p>";
					echo "</td>";
					echo "<td></td>";
				}

				if($rowMatiere['etat']>=4)
				{
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier1" size="30">';
					echo '<input type="submit" name="upload1" value="Uploader">';?>
					<input type="hidden" name="nummat" value="<?PHP echo $rowMatiere['NumMatiere'];?>">
					<?PHP
echo "</p>";
					echo "</td>";
					echo "<td><input type='submit' name='Telecharger1' value='Telecharger' /></td>";
					echo "<td><input type='submit' name='Telecharger2' value='Telecharger' /></td>";
					echo "<td>";
					echo "<p>";
					echo '<input type="file" name="fichier2" size="30">';
					echo '<input type="submit" name="upload2" value="Uploader">';
					echo "</p>";
					echo "</td>";
					echo "<td><input type='submit' name='Telecharger3' value='Telecharger' /></td>";
				}

				$rowMatiere = mysqli_fetch_array($resultMatiere,MYSQLI_ASSOC);

			}

			echo "</tr>";
			echo "</tbody>";
			
		}


	}


}


if( isset($_POST['upload1']) ) // si formulaire soumis
{

    header ('location:readf1.php'); //redirection a la page import

}

if( isset($_POST['Telecharger1']) ) // si formulaire soumis
{

    header ('location:demo.php'); //redirection a la page import

}

if( isset($_POST['Telecharger2']) ) 
{

    header ('location:demo2.php'); 

}

if( isset($_POST['upload2']) ) 
{

    header ('location:readf2.php'); 

}

if( isset($_POST['Telecharger3']) ) 
{

    header ('location:demo3.php'); 

}


echo "</body>";
}

?>