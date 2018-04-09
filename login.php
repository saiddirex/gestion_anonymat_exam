<?php
   include("connexion.php");
   session_start();
      if($_POST) {
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = md5($_POST['password'],TRUE); 
      
      $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) 
	  {
		  $delet = $row['delet'];
		  if($delet==1)
		  {
			  echo "\n";
			  echo "compte non existant";
			  header("location: index.php");
			  echo "\n";
		  }
		  else
		  {

		  	  $nom = $row['nom'];
			  $categorie= $row['categorie'];
			  $_SESSION['categorie'] = $categorie;
			  $_SESSION['nom'] = $nom;
			  $_SESSION['prenom'] = $row['prenom'];
			  $_SESSION['username'] = $username;
			  $_SESSION['password'] = $password;

		  	if($row['actif']==1){

			  $date = date("Y-m-d H:i:s");

			  $sql="UPDATE users SET derniere_connexion='$date' WHERE username = '$username'";
			  $res = mysqli_query($db,$sql);
			 
			  if($categorie == 'AD')
			  {

				   header("location: accueilAdmin.php");
			  }
			  else
			  {
				   header("location: choix.php");
			  }
			}

			else 
			{

				$date = date("Y-m-d H:i:s");
				$sql="UPDATE users SET derniere_connexion='$date',actif=1 where username = '$username'";
			    $res = mysqli_query($db,$sql);
			    	header("location: modifierMotPasse.php");
			}
		  }
      
      }
	  else 
	  {
		 echo "\n";
         echo "votre login/mot de passe incorrect !";
		 echo "\n";
      }
	  }
	  
?>





