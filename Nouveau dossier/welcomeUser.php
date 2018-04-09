
<?php
   include('session.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ENSIAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><?php echo $_SESSION['nom']."\t".$_SESSION['prenom'];?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="welcomeUser.php">Accueil</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Statistiques <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="graphFilieresUser.php" >Etats de progression des filières</a></li>
            <li><a href="showProgressUser.php">Statistiques par filières</a></li>
            <li><a href="GraphProgressUser.php">Graphique de progression de chaque filiere</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon Compte <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Historiques Personnels</a></li>
            <li role="separator" class="divider"></li>
            <li><a>Mise à jour de :</a></li>
            <li><a href="modifierUser.php"> - Mon mot de passe</a></li>
            <li><a href="#"> - Mon nom et prénom </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Se déconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
  

  <?php


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
  echo "<h1 align='center'>Choix pour gestion des matiéres</h1>";
  echo "<table cellspacing='15px' border='0px' align='center'>";
  echo "<form action='matieres.php' method='POST'>";
  echo "<tr>";
  echo "<td><select name='Filiere'>";
  echo "<option>Choisir une filiére : </option>";

while(count($rowFiliere)!=0)
{

  echo "<OPTION>".$rowFiliere['DesignationFilliere']."</OPTION>";

  $rowFiliere = mysqli_fetch_array($resultFiliere,MYSQLI_ASSOC);

}

echo "</td>";
echo "<td><select name='Semestre'>";
echo "<option>Choisir un semestre :</option>";

for ($i=0;$i<count($tableSemestre);$i++)
{
  echo "<OPTION>".$tableSemestre[$i]."</OPTION>";
}

echo "<td></td>";
echo "</td>";
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
    $_SESSION['filiere'] = $Filiere;
    $_SESSION['semestre'] = $Semestre;
    header("location:matieres.php");
  }
}
}
?>  



