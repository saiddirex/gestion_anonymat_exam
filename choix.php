<?php



include('user.php');
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
  echo"<h1 align='center'>Tableau de bord</h1>";
  echo "<table cellspacing='15px' border='0px' align ='center' >";
  echo "<form action='choix.php' method='POST'>";
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
      echo "<table cellspacing='15px' border='1px' align ='center' width = '100%'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th> Semestre : ".$Semestre."</th>";
      echo "<th> Filière : ".$Filiere." </th>";
      echo "</tr>";
      echo "</thead>";


      echo "<table cellspacing='0px' border='1px' align ='center' width = '100%'>";
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
          //echo '<input type="file" name="fichier1" size="30">';
          echo '<form method="post" enctype="multipart/form-data" action="uploadf1.php">
        <p>
            <input type="file" name="fichier" size="30">
            <input type="submit" name="upload" value="Uploader">
        </p>';
          //echo "<a href='readf1.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
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
          echo "<a href='readf1.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
          echo "</p>";
          echo "</td>";
          echo "<td><a href='demo.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";


        }


        if ($rowMatiere['etat']==2)
        {
          echo "<td>";
          echo "<p>";
          echo '<input type="file" name="fichier1" size="30">';
          echo "<a href='readf1.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
          echo "</p>";
          echo "</td>";
          echo "<td><a href='demo.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td><a href='demo2.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td></td>";
          echo "<td></td>";


        }

        if($rowMatiere['etat']==3)
        {
          echo "<td>";
          echo "<p>";
          echo '<input type="file" name="fichier1" size="30">';
          echo "<a href='readf1.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
          echo "</p>";
          echo "</td>";
          echo "<td><a href='demo.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td><a href='demo2.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td>";
          echo "<p>";
          echo '<input type="file" name="fichier2" size="30">';
          echo "<a href='readf2.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
          echo "</p>";
          echo "</td>";
          echo "<td></td>";
        }

        if($rowMatiere['etat']>=4)
        {
          echo "<td>";
          echo "<p>";
          echo '<input type="file" name="fichier1" size="30">';
          echo "<a href='readf1.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
          echo "</p>";
          echo "</td>";
          echo "<td><a href='demo.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td><a href='demo2.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
          echo "<td>";
          echo "<p>";
          echo '<input type="file" name="fichier2" size="30">';
          echo "<a href='readf2.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a>";
          echo "</p>";
          echo "</td>";
          echo "<td><a href='demo3.php?m=".$rowMatiere['NumMatiere']."' >Telecharger</a></td>";
        }

        $rowMatiere = mysqli_fetch_array($resultMatiere,MYSQLI_ASSOC);

      }

      echo "</tr>";
      echo "</tbody>";
      
    }


  }


}


echo "</body>";
}

?>