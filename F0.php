

 <?php

	


	function fonction()
	{	

include("connexion.php");
		$requette = "SELECT * FROM etudiants";

		$resultat = mysqli_query($db,$requette);

		$nbetudiants = mysqli_num_rows($resultat) ;


		$i= (int)(rand(1,$nbetudiants));
	       
		$listetudiant = "SELECT * FROM notes";
		if($etudiants= mysqli_query($db,$listetudiant)) 
			{
				while($numetudiant= mysqli_fetch_array($etudiants,MYSQLI_ASSOC)) 
				   {
					$Nm=$numetudiant['NumApogee']; //  le numéro d'etudiant
				
					if($i==$nbetudiants+1) $i=1;  // $i ne doit pas depasser le nombre total des etudiants 
					$sql_ins ="UPDATE Notes SET CodeAnonyme='$i' where NumApogee='$Nm'";
					mysqli_query ($db,$sql_ins) ;//or die mysqli_error($db));
					$i++;
				
				   }
			}
	
	return 1;	

	}
	

?>
