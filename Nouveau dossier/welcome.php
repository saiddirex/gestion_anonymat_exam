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
      <a class="navbar-brand" href="#">ENSIAS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Accueil</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Statistiques <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Statistiques par filières</a></li>
            <li><a href="#">Statistiques par filières</a></li>
            <li><a href="#">Statistiques par matières</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Historique des tâches</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion des comptes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Créer un compte</a></li>
            <li><a href="#">Supprimer un compte</a></li>
            <li><a href="#">Modifier le mot de passe d'un compte</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Historiques des comptes</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Etat des comptes</a></li>
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
            <li><a href="#"> - Mon mot de passe</a></li>
            <li><a href="#"> - Mon nom et prénom </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Se déconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
  
