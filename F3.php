
	<?php	


	$tab=array('72','74','86','85','7','38','47','55','52','69','81','88','26','57','66','63','70','10','8','53','43','15','19','29','89','79','61','17','9','20','31','12','14','22','98'
	,'94','93','16','41','27','24','73','78','82','58','75','97','91','25','35','23','96','64','18','21','67','44','71','87','90','28','5','3','49','48','92','51','46','13','99','62'
	,'54','36','56','1','11','30','40','80','84','95','65','34','42','32','37','6','45','83','60','76','68','77','2','4','50','59','39','4','100');
	

				
	
			//declaration de la 3ème fonction de cryptage 
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
		
