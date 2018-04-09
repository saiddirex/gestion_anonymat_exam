<?php
include("miseAjourBaseView.php");
if($_SESSION['categorie'] == 'AD')
{
	if($_POST)
	{
		$password = md5($_POST['password'],TRUE);

		if($password == $_SESSION['password'])
		{
			$deleteEtudiant = "DELETE from etudiants";
            $deleteNote = "DELETE from notes";
            $deleteAnonyme = "UPDATE type_anonyme SET type = 0";
            $deleteHistorique = "DELETE from historiques";

            $resultEtudiant = mysqli_query($db,$deleteEtudiant);
            $resultNote = mysqli_query($db,$deleteNote);
            $resultAnonyme = mysqli_query($db,$deleteAnonyme);
            $resultHistorique  = mysqli_query($db,$deleteHistorique );

            header("location:accueilAdmin.php");
            
		}
		else
			echo "Mot de passe incorrect \n";


	}
}		



?>