


	<?php	
		
	

	
	$tab=array('96','v','18','21','S','44','71','Z','90','28','c','s','49','Y','92','51','g','V','99','53','P','r','19','u','89','79','R','17','K','20','X','12','l','22','T',
'p','93','w','41','d','24','e','k','82','58','C','97','D','W','h','36','y','F','11','q','40','M','a','95','x','34','f','E','35','23','I','37','b','45','j','i','76','A','p','77','G','B','59','J','4','L',
'z','74','m','85','H','38','Q','55','n','t','o','81','26','57','U','63','O','10','N');

				
	
			//declaration de la 4ème fonction de cryptage 
		function fonction($Ne,$Nm,$tab)// cryptage Numerique (avec num Matière)
			{
				include('connexion.php');
			$listeMatieres = "SELECT * FROM matieres WHERE NumMatiere = '$Nm'";
			if($dataListeMatieres = mysqli_query($db,$listeMatieres)) 
			{
				$Matiere = mysqli_fetch_array($dataListeMatieres,MYSQLI_ASSOC);
			
				$NumMatiereCorresp=$Matiere['NumMatCorrespondant'];
			}
		
			$ch='';
			$a=$Ne%100;
			$b=($Ne/100)%100;
			$c=($Ne/10000)%100;
			$d=(int)($Ne/1000000);
			$ch=$ch.$tab[$a].$tab[$b].$tab[$c].$tab[$d].$tab[$NumMatiereCorresp];
			return($ch);
			}
    	?>
			


