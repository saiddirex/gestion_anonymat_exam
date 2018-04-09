<?php

//     il faut tout d'abord declarer les deux variables globales $choix (le choix de niveau d'anonymat 0,1,2,3 ou 4)  
//      et $NumMat (le numero de matiere avec laquelle l'administrateur veut générer le code anonyme).   

require('connexion.php');
	//$NumMat='jfe11504';

	$reqChoix = "SELECT * FROM type_anonyme ";
	$resultatChoix = mysqli_query($db,$reqChoix);

	$row = mysqli_fetch_array($resultatChoix,MYSQLI_ASSOC);

	$choix=$row['type'];
	
if($choix==0)
				include ("F0.php");
		if($choix==1)
				include ("F1.php");
		if($choix==2)
				include ("F2.php");
		if($choix==3)
				include ("F3.php");
		if($choix==4)
				include ("F4.php");	

	
	
	$tab1 = array('');
	$tab2= array('');
	$i=0;
	$k=0;
	
	if($choix==0)
	$m=fonction();
	
	if($choix!=0)
	{

			$requet = "SELECT NumApogee FROM notes";

			if($result = mysqli_query($db,$requet))
		   	
			 {
			  
			      	   while($ligne = mysqli_fetch_array($result))
					{
					    $Ne = $ligne[0];
					    $tab1[$k]=$Ne;
					    
					    if($choix==1 || $choix==2)
					    $ch=fonction($Ne,$tab);
					    
					    if($choix==3 || $choix==4)
					   
					    	
					    $ch=fonction($Ne,$NumMat,$tab);
					    

					    
					    
					    $tab2[$k]=$ch;
					    
					    $k++;

					}
		   	
			 }





			$j=0;
			while($j < count($tab2))
			 {

			    $sql_ins1 = "UPDATE notes set CodeAnonyme='$tab2[$j]' where NumApogee='$tab1[$j]'";

			    $req=mysqli_query($db,$sql_ins1)or die (mysqli_error($db));
			   
			    $j++;
			 }
	}






    	?>

