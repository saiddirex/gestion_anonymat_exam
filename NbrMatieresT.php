<?php

include("connexion.php");

	function nbrMatieresTraitees($tabnbrMatieresTraitees) {
		include("connexion.php");
		$tabFilieres = array();
		$tabnbrMatieresTraitees = array();
		$tabFilieresDistinct = array();
		$req1 = "SELECT DISTINCT
		numfilliere from fillieres order by numfilliere";

		$req2 = "SELECT DISTINCT
		matieres.nummatiere,
		matieres.nummodule ,
		etat,
		numfilliere 
        FROM matieres ,  modules 
        WHERE  matieres.nummodule=modules.nummodule and etat = 5 order by numfilliere";
	$res1 = mysqli_query($db,$req1);
	$res2 = mysqli_query($db,$req2);
	while ($data = mysqli_fetch_array($res1)){
	$tabFilieresDistinct [] = $data ['numfilliere'];
	}
	while ($data = mysqli_fetch_array($res2)){
	$tabFilieres [] = $data ['numfilliere'];
	}
	
	
$CptMatTraiteFil1=0; 
$CptMatTraiteFil2=0; 
$CptMatTraiteFil3=0; 
$CptMatTraiteFil4=0; 
$CptMatTraiteFil5=0; 
$CptMatTraiteFil6=0;
$z=0;
$y=sizeof($tabFilieres);


while ($y>0){
    if (in_array($tabFilieresDistinct[0],$tabFilieres)){
		$CptMatTraiteFil1++;
	    unset($tabFilieres[$z]);
		$y--;
		$z++;
	}
	elseif (in_array($tabFilieresDistinct[1],$tabFilieres)){
		$CptMatTraiteFil2++;
	    unset($tabFilieres[$z]);
		$y--;
		$z++;
	}
	elseif (in_array($tabFilieresDistinct[2],$tabFilieres)){
		$CptMatTraiteFil3++;
		unset($tabFilieres[$z]);
		$y--;
		$z++;
	}
	elseif (in_array($tabFilieresDistinct[3],$tabFilieres)){
		$CptMatTraiteFil4++;
		unset($tabFilieres[$z]);
		$y--;
		$z++;
	}
	elseif (in_array($tabFilieresDistinct[4],$tabFilieres)){
		$CptMatTraiteFil5++;
		unset($tabFilieres[$z]);
		$y--;
		$z++;
	}
	elseif (in_array($tabFilieresDistinct[5],$tabFilieres)){
		$CptMatTraiteFil6++;
		unset($tabFilieres[$z]);
		$y--;
		$z++;
	}

	
$tabnbrMatieresTraitees[0]=$CptMatTraiteFil1;
$tabnbrMatieresTraitees[1]=$CptMatTraiteFil2;
$tabnbrMatieresTraitees[2]=$CptMatTraiteFil3;
$tabnbrMatieresTraitees[3]=$CptMatTraiteFil4;
$tabnbrMatieresTraitees[4]=$CptMatTraiteFil5;
$tabnbrMatieresTraitees[5]=$CptMatTraiteFil6;
}
return $tabnbrMatieresTraitees;
}
?>