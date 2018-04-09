<?php
include("session.php");
if($_SESSION['categorie'] == 'AD')
  include("Admin.php");
else
  include("viewUser.php");
?>


<p style="text-align:center;">
<img src="./graph.png"  alt="" title="" style="float:center;margin:0 auto;" /></p>



<?php
//include("welcomeAdmin.php");
include ("./jpgraph/src/jpgraph.php");
include ("./jpgraph/src/jpgraph_bar.php");
//include ("./tracer.php");
include("connexion.php");
$tabNumFilieres = array();
$tabNombreMatieres = array();
$tabFilieres = array();
$tabEtat = array();
$tabPourcentage = array();
$tabEtat0 = array();
$tabEtat1 = array();
$tabEtat2 = array();
$tabEtat3 = array();
$tabEtat4 = array();
$tabEtat5 = array();
$i=0;

$queryDesignationFil="SELECT designationfilliere FROM fillieres";
$queryNumsFil="SELECT numfilliere FROM fillieres";
//Tracer($queryDesignationFil);
//Tracer($queryNumsFil);


$designationsFil = mysqli_query($db, $queryDesignationFil);
$numsFil = mysqli_query($db, $queryNumsFil);

/* Remplir le tableau avec les designations de filieres */
while ($donnees = mysqli_fetch_assoc($designationsFil)) { 
	$tabFilieres[$i] = $donnees['designationfilliere'];
	$i++;
}

$parcoursTab=0;
$limiteIndex=0;
$limiteEtat=0;
$index=0;


/* Remplir les tableaux nombres de matieres par filiere et nombre de matieres dans un etat quelconque par filiere */
while ($donnees = mysqli_fetch_assoc($numsFil)) { 
	$tabNumFilieres[$parcoursTab] = $donnees['numfilliere'];
	$numeroFiliere=$donnees['numfilliere'];
	$queryNbrMatieres = "SELECT count(*) as nombreMatieres FROM matieres, modules WHERE matieres.nummodule=modules.nummodule AND modules.numfilliere=$numeroFiliere";
	//Tracer($queryNbrMatieres);
	$resultat2 = mysqli_query($db, $queryNbrMatieres);
	$nbr=mysqli_fetch_assoc($resultat2);
	$tabNombreMatieres[$parcoursTab]=$nbr['nombreMatieres'];
	$limiteIndex=$limiteIndex+6;
	// Nombre de matières par etat par filiere
	while($index<$limiteIndex) {
		// L'etat doit toujours être compris entre 0 et 5
		$etat=$index-$limiteEtat;
		$queryCountEtat ="SELECT count(*) as countEtat FROM matieres, modules WHERE matieres.nummodule=modules.nummodule AND matieres.etat=$etat AND modules.numfilliere=$numeroFiliere";
		//Tracer($queryCountEtat);
		$countEtat = mysqli_query($db, $queryCountEtat);
		$etat=mysqli_fetch_assoc($countEtat);
		$tabEtat[$index]=$etat['countEtat'];
		$index++;
	}
	$limiteEtat=$limiteEtat+6;
	$parcoursTab++;
}

/* tableau des pourcentages */

$i=0;
$limite=6;
for($k=0;$k<sizeof($tabEtat);$k++) {
	if($k<$limite) {
			$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[$i])*(100);
	}
	else {
		$limite=$limite+6;
		$i++;
		$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[$i])*(100);

	}
	/*elseif ($k<12) {
			$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[1])*(100);
	}
	elseif ($k<18) {
			$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[2])*(100);
	}
	elseif ($k<24) {
			$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[3])*(100);
	}
	elseif ($k<30) {
			$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[4])*(100);
	}
	elseif ($k<36) {
			$tabPourcentage[$k]=($tabEtat[$k]/$tabNombreMatieres[5])*(100);
	}*/
}

$compteurEtat0=0;
$compteurEtat1=0;
$compteurEtat2=0;
$compteurEtat3=0;
$compteurEtat4=0;
$compteurEtat5=0;

/* Remplir les tableaux de chaque etat */
for($c=0;$c<sizeof($tabPourcentage);$c++) {
	$mod=$c%6;
	if ($mod==0) {
		$tabEtat0[$compteurEtat0]=$tabPourcentage[$c];
		$compteurEtat0++;
	}
	elseif ($mod==1) {
		$tabEtat1[$compteurEtat1]=$tabPourcentage[$c];
		$compteurEtat1++;
	}
	elseif ($mod==2) {
		$tabEtat2[$compteurEtat2]=$tabPourcentage[$c];
		$compteurEtat2++;
	}
	elseif ($mod==3) {
		$tabEtat3[$compteurEtat3]=$tabPourcentage[$c];
		$compteurEtat3++;
	}
	elseif ($mod==4) {
		$tabEtat4[$compteurEtat4]=$tabPourcentage[$c];
		$compteurEtat4++;
	}
	elseif ($mod==5) {
		$tabEtat5[$compteurEtat5]=$tabPourcentage[$c];
		$compteurEtat5++;
	}
	

}

/* Combiner le tableau des designations de filiere avec celui des nombres de matieres pour afficher ses donnees dans l'axe des x du graphe */
$tabMerge = array();

for($i=0;$i<sizeof($tabFilieres);$i++) {
	$tabMerge[$i]=$tabFilieres[$i] . " " . $tabNombreMatieres[$i] . "mat";
}


// **********************
// Création du graphique 
// **********************
$graph = new Graph(600,480,"auto");    
$graph->ClearTheme();  
$graph->SetFrame(false);
$graph->SetScale("textlin");
$graph->img->SetMargin(70,70,50,50);
$graph->SetMarginColor('white');
$graph->title->Set("Etats de progression des filieres");
$graph->title->SetMargin(10);
$graph->title->SetFont(FF_GEORGIA,FS_BOLD, 14);






// Créer les ensembles d'histogrammes
$etat5 = new BarPlot($tabEtat5);
$etat5->SetFillGradient('blue', 'white', GRAD_VER);
$etat5->SetLegend('Etat 5');
$etat5->value->Show();
$etat5->value->SetFont(FF_ARIAL, FS_BOLD,9);
$etat5->value->SetColor('black');
$etat5->SetColor("gray");
$etat5->value->SetFormat('%.1f pc');

$etat4 = new BarPlot($tabEtat4);
$etat4->SetFillGradient('turquoise', 'white', GRAD_VER);
$etat4->SetLegend('Etat 4');
$etat4->SetColor("gray");
$etat4->value->Show();
$etat4->value->SetFont(FF_ARIAL, FS_BOLD,9);
$etat4->value->SetColor('black');
$etat4->value->SetFormat('%.1f pc');

$etat3 = new BarPlot($tabEtat3);
$etat3->SetFillGradient('green', 'white', GRAD_VER);
$etat3->SetLegend('Etat 3');
$etat3->SetColor("gray");
$etat3->value->Show();
$etat3->value->SetFont(FF_ARIAL, FS_BOLD,9);
$etat3->value->SetColor('black');
$etat3->value->SetFormat('%.1f pc');

$etat2 = new BarPlot($tabEtat2);
$etat2->SetFillGradient('yellow', 'white', GRAD_VER);
$etat2->SetLegend('Etat 2');
$etat2->SetColor("gray");
$etat2->value->Show();
$etat2->value->SetFont(FF_ARIAL, FS_BOLD,9);
$etat2->value->SetColor('black');
$etat2->value->SetFormat('%.1f pc');

$etat1 = new BarPlot($tabEtat1);
$etat1->SetFillGradient('orange', 'white', GRAD_VER);
$etat1->SetLegend('Etat 1');
$etat1->SetColor("gray");
$etat1->value->Show();
$etat1->value->SetFont(FF_ARIAL, FS_BOLD,9);
$etat1->value->SetColor('black');
$etat1->value->SetFormat('%.1f pc');

$etat0 = new BarPlot($tabEtat0);
$etat0->SetFillGradient('red', 'white', GRAD_VER);
$etat0->SetLegend('Etat 0');
$etat0->SetColor("gray");
$etat0->value->Show();
$etat0->value->SetFont(FF_ARIAL, FS_BOLD,9);
$etat0->value->SetColor('black');
$etat0->value->SetFormat('%.1f pc');

// Créer l'ensemble d'histogrammes accumulés
$gbplot = new AccBarPlot(array($etat0,$etat1,$etat2,$etat3,$etat4,$etat5));




// Ajouter l'ensemble accumulé
$graph->Add($gbplot);

// Position de la légende
$graph->legend->Pos(0.02,0.15,"right","top");

// Paramétrer les axes X et Y
$graph->yaxis->title->Set("Pourcentage");
$graph->yaxis->title->SetMargin(10);
$graph->yaxis->title->SetFont(FF_GEORGIA,FS_BOLD, 9);

$graph->xaxis->title->Set("Filieres");
$graph->xaxis->SetTickLabels($tabMerge);
$graph->xaxis->title->SetMargin(4);
$graph->xaxis->title->SetFont(FF_GEORGIA,FS_BOLD, 9);

// Afficher l'image générée
//$graph->Stroke();


$filename="./graph.png";
if (file_exists($filename)) {
	unlink($filename);
	$graph->Stroke($filename);

}
else {
	$graph->Stroke($filename);
}
?>