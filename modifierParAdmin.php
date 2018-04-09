<?php
	include('viewmodifierParAdmin.php');
	if(isset($_SESSION['categorie']))
	{
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST['username'];
		$password1 = md5($_POST['password1'],TRUE);
		$password2 = md5($_POST['password2'],TRUE);
		$password3 = md5($_POST['password3'],TRUE);
		
		$sql1 = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db,$sql1);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
		
		if($count == 1 && $row['delet']==0) 
		{
			if($password3 == $_SESSION['password'])
			{
				if($password1 == $password2)
				{
					
				$sql = "UPDATE users SET password='$password1' where username = '$username'";
				$res = mysqli_query($db,$sql);
				if(!$res)
				{
					die("query failed".mysqli_error($connect));
				}
				else
				{
					echo "mot de passe modifié";
					header("location:AccueilAdmin.php");
				}
				}
			}

			else
			{
				echo "votre mot de passe n'est pas correct ";
			}

		}
		else
		{
            echo "compte  n'éxiste pas";			
		}
    }
	}
	else
	{
		header("location:login.php");
	}
?>


