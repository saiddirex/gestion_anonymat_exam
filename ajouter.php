<?php
	include('ajouterview.php');
	if(isset($_SESSION['categorie']))
	{
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST['username'];
		$password1 = md5($_POST['password1'], TRUE);
		$password2 = md5($_POST['password2'], TRUE);
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		
		$sql1 = "SELECT * FROM users WHERE username = '$username'";
        $result1 = mysqli_query($db,$sql1);
        $count = mysqli_num_rows($result1);
		
		if($count == 0) 
		{
			if($password1 == $password2)
			{
				$delet = 0;
				$date = date("Y-m-d H:i:s");
				$categorie = 'US' ;
				$actif = 0;
				$sql = "INSERT INTO users(username,password,delet,categorie,actif,derniere_connexion,nom,prenom,date_suppression,date_ajout) VALUES('$username','$password1','$delet','$categorie','$actif','$date','$nom','$prenom','$date','$date')";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($db));
				}
				else
				{
					echo "ajouté";
					//header("location:accueilAdmin.php");
				}
			}
			else
			{
				echo "les mots de passe ne sont pas identiques ";
			}

		}
		else
		{
            echo "compte déjà éxistant";			
		}
    }
	}
	else
	{
		header("location:login.php");
	}
?>
