<?php
	include('viewModifierNomPrenom.php');

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_SESSION['username'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];


				if(!empty($_POST['nom']) && !empty($_POST['prenom']))
				{

				$sql = "UPDATE users SET nom='$nom',prenom='$prenom' where username = '$username'";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($connect));
				}

				$_SESSION['nom']=$nom;
				$_SESSION['prenom']=$prenom;
				if($_SESSION['categorie']=='AD')
					header("location:accueilAdmin.php");
				else
					header("location:choix.php");


			}
				else
				{
				if(empty($_POST['nom']) && !empty($_POST['prenom']) )
				{

				$sql = "UPDATE users SET prenom='$prenom' where username = '$username'";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($connect));
				}
				$_SESSION['prenom']=$prenom;
				if($_SESSION['categorie']=='AD')
					header("location:accueilAdmin.php");
				else
					header("location:choix.php");
				}
				else
				{
				if(empty($_POST['prenom']) && !empty($_POST['nom']))
				{

				$sql = "UPDATE users SET nom='$nom' where username = '$username'";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($connect));
				}
				$_SESSION['nom']=$nom;
				if($_SESSION['categorie']=='AD')
					header("location:accueilAdmin.php");
				else
					header("location:choix.php");
				}
				else
					echo "veuillez saisir un champs \n";
				}
			}


    }

?>


  