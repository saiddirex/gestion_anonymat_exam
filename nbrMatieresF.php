<?php

include("connexion.php");

	function nbrMatieres($tabnbrMatieres) {
		include("connexion.php");
		$tabnbrMatieres = array();
		$tabFilieres = array();
		$tabFilieresDistinct = array();
		$req2 = "SELECT DISTINCT
		numfilliere from fillieres order by numfilliere";
		
		
		$req1 = "
        SELECT DISTINCT
        matieres.nummatiere,
		matieres.nummodule,
		numfilliere 
        FROM matieres, modules 
        WHERE matieres.nummodule=modules.nummodule order by numfilliere";
	
	$res1 =mysqli_query($db,$req1);
	$res2 = mysqli_query($db,$req2);
	while ($data = mysqli_fetch_array($res2)){
	$tabFilieresDistinct [] = $data ['numfilliere'];
	}
	while ($data = mysqli_fetch_array($res1)){
	$tabFilieres [] = $data ['numfilliere'];
	}

$CptMatFil1=0; 
$CptMatFil2=0; 
$CptMatFil3=0; 
$CptMatFil4=0; 
$CptMatFil5=0; 
$CptMatFil6=0;
$i=0;
$k=sizeof($tabFilieres);
while ($k>0){
    if (in_array($tabFilieresDistinct[0],$tabFilieres)){
		$CptMatFil1++;
	    unset($tabFilieres[$i]);
		$k--;
		$i++;
	}
	elseif (in_array($tabFilieresDistinct[1],$tabFilieres)){
		$CptMatFil2++;
	    unset($tabFilieres[$i]);
		$k--;
		$i++;
	}
	elseif (in_array($tabFilieresDistinct[2],$tabFilieres)){
		$CptMatFil3++;
		unset($tabFilieres[$i]);
		$k--;
		$i++;
	}
	elseif (in_array($tabFilieresDistinct[3],$tabFilieres)){
		$CptMatFil4++;
		unset($tabFilieres[$i]);
		$k--;
		$i++;
	}
	elseif (in_array($tabFilieresDistinct[4],$tabFilieres)){
		$CptMatFil5++;
		unset($tabFilieres[$i]);
		$k--;
		$i++;
	}
	elseif (in_array($tabFilieresDistinct[5],$tabFilieres)){
		$CptMatFil6++;
		unset($tabFilieres[$i]);
		$k--;
		$i++;
	}


	
$tabnbrMatieres[0]=$CptMatFil1;
$tabnbrMatieres[1]=$CptMatFil2;
$tabnbrMatieres[2]=$CptMatFil3;
$tabnbrMatieres[3]=$CptMatFil4;
$tabnbrMatieres[4]=$CptMatFil5;
$tabnbrMatieres[5]=$CptMatFil6;
}
return $tabnbrMatieres;
}
?>