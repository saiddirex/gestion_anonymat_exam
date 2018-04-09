<?php
include("login.php");
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
      <a class="navbar-brand" href="#">Espace de connexion</a>
    </div>
    </div>
    </nav>

<html>
<h1 align="center">Se connecter</h1>
</br>
<table cellspacing='15px' border='0px' align="center">
    <form action = 'login.php' method = 'post'>
    <tr>
    	<td> Login:</td>
    	<td><input type = 'text' name = 'username'></td>
    </tr>
    <tr>
    	<td>mot de passe:</td>
    	<td><input type = 'password' name='password'></td>
    </tr>
    </table>
    </br>
<table cellspacing='15px' border='0px' align="center">
    <tr>
    	
    	<td align="right"><input type = 'submit' value="Login"></td>
    </tr>
    </form>
    </table>



</html>
