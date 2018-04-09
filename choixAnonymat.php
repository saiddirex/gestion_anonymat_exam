<?php
include("choixAnonymatView.php");
if (isset($_POST['Validerbtn']))
{
	$choix = $_POST['choix'];
	$password = md5($_POST['password'],TRUE);
    
    if(empty($choix)||empty($password))
    	echo "veuillez remplir les champs \n";
    else
    {
    	if($password == $_SESSION['password'])
    	{
    	if($choix == 1)
    		$type = 0;
    	if($choix == 2)
    		$type = 1;
    	if($choix == 3)
    		$type = 2;
    	if($choix == 4)
    		$type = 3;
    	if($choix == 5)
    		$type = 4;

    	$reqchoix = "UPDATE type_anonyme SET type = '$type'";
    	$resultatchoix = mysqli_query($db,$reqchoix);
    	//header("location:accueilAdmin.php");
    }
    else
    	echo "Votre mot de passe est incorrect \n";
    }

}

?>