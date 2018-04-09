<?php
	include('viewSupprimerMonCompte.php');

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_SESSION['username'];
		$password1 = md5($_POST['password1'],TRUE);
		$password2 = md5($_POST['password2'],TRUE);

			if($password1 == $_SESSION['password'])
			{
				if($password1 == $password2)
				{
				$sql = "UPDATE users SET delet=1 where username = '$username'";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($connect));
				}
				else
				{
					header("location: index.php");
					echo "le compte est supprimé";
				}
			}
			else 
				echo "les deux mot de passe ne sont pas identiques \n";
			}
			else
			{
				echo "le mot de passe  éroné";
			}

    }
?>
