<?php
include('viewSupprimerParAdmin.php');

	
	if($_SESSION['categorie'] == 'AD')
	{
	if($_POST)
	{
		$username = $_POST['username'];
		$password1 = md5($_POST['password1'],TRUE);
		$password2 = md5($_POST['password2'],TRUE);
		
		$sql1 = "SELECT * FROM users WHERE username = '$username'";
        $result1 = mysqli_query($db,$sql1);
        $count = mysqli_num_rows($result1);
		
		if($count == 1) 
		{
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
					echo "compte supprimé ";
					//header("location:accueilAdmin.php");
				}
			}
			else
				echo "les mots de passe ne sont pas identiques \n";
			}
			else
			{
				echo "le mot de passe est invalide ";
			}

		}
		else
		{
            echo "compte n'éxiste pas ";			
		}
    }
	}
	else
	{
		//header("location:login.php");
	}
?>

  

