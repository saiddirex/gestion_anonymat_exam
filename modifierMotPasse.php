<?php
	include('viewModifierMotPasse.php');

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_SESSION['username'];
		$password1 = md5($_POST['password1'],TRUE);
		$password2 = md5($_POST['password2'],TRUE);
		$password3 = md5($_POST['password3'],TRUE);

			if($password1 == $_SESSION['password'])
			{
				if($password2 == $password3)
				{

				$sql = "UPDATE users SET password='$password2' where username = '$username'";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($connect));
				}
				else
				{
					$_SESSION['password']=$password2;
					echo "le mot de passe est modifié";
					if($_SESSION['categorie']=='AD')
					{
					    header("location: AccueilAdmin.php");
					}
					else
					{
						header("location: choix.php");
					}
				}
			}
			else 
				echo "les nouveau mot de passe ne sont pas identiques !\n";
			}
			else
			{
				echo "le mot de passe actuel éroné";
			}

    }

?>


  

