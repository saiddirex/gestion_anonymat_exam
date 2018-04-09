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
include ("jpgraph/src/jpgraph.php");
include ("jpgraph/src/jpgraph_bar.php");
//include ("./tracer.php");
include("connexion.php");
$tabNumFilieres = array();
$tableaupsup = array();
$tableaupmin = array();
$tabNombreMatieres = array();
$tabFilieres = array();
$tabEtat = array();
$tableaupourcentage = array();
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
	$j=0;
	while($j<sizeof($tabNumFilieres)) {
		$queryCountEtat ="SELECT count(*) as countEtat FROM matieres, modules WHERE matieres.nummodule=modules.nummodule AND matieres.etat=5 AND modules.numfilliere=$numeroFiliere";
		$countEtat = mysqli_query($db, $queryCountEtat);
		$etat=mysqli_fetch_assoc($countEtat);
		$tabEtat[$j]=$etat['countEtat'];
		$j++;

	}

	$parcoursTab++;
}

/* tableau des pourcentages */

for($i=0;$i<sizeof($tabEtat);$i++) {
	$tableaupourcentage[$i]=($tabEtat[$i]/$tabNombreMatieres[$i])*100;
}
for ($t=0; $t<sizeof($tableaupourcentage); $t++)
	if ($tableaupourcentage[$t]>80){
		$tableaupsup[$t]=($tableaupourcentage[$t]-80);
		$tableaupmin3[$t]=20;
		$tableaupmin2[$t]=20;
		$tableaupmin1[$t]=20;
		$tableaupmin[$t]=20;
	}
	else if ($tableaupourcentage[$t]>60){
		$tableaupmin3[$t]=($tableaupourcentage[$t]-60);
		$tableaupsup[$t]=0;
		$tableaupmin2[$t]=20;
		$tableaupmin1[$t]=20;
		$tableaupmin[$t]=20;
	}
	else if ($tableaupourcentage[$t]>40){
		$tableaupmin2[$t]=($tableaupourcentage[$t]-40);
		$tableaupmin3[$t]=0;
		$tableaupsup[$t]=0;
		$tableaupmin1[$t]=20;
		$tableaupmin[$t]=20;
	}
	else if ($tableaupourcentage[$t]>20){
		$tableaupmin1[$t]=($tableaupourcentage[$t]-20);
		$tableaupmin3[$t]=0;
		$tableaupmin2[$t]=0;
		$tableaupsup[$t]=0;
		$tableaupmin[$t]=20;
	}
	else{
	    $tableaupmin[$t]=$tableaupourcentage[$t];
	    $tableaupsup[$t]=0;
		$tableaupmin3[$t]=0;
		$tableaupmin2[$t]=0;
		$tableaupmin1[$t]=0;
	}
	

$tabFiliereMatieres=array();
for ($i=0;$i<sizeof($tabFilieres);$i++){
$tabFiliereMatieres[$i]=$tabFilieres[$i]. " " ."(".$tabNombreMatieres[$i]. " mat)" ;
 }//or array_merge_recursive.
/*
 print_r($tableaupmin);
 echo "<br />";
 print_r($tableaupmin1);
 echo "<br />";
 print_r($tableaupmin2);
  echo "<br />";
 print_r($tableaupsup);
 echo "<br />";
 print_r($tableaupourcentage);
 echo '<br />';
 print_r($tabnbrMatieresTraitees);
 echo "<br />";
 print_r($tabnbrMatieres);
*/

// Create the graph.
$graph = new Graph(700,500);
$graph->SetScale('textlin');
$graph->SetMarginColor('white');

// Setup title
$graph->title->Set('Graphique de progression de chaque filiere');
$plot = new BarPlot($tableaupourcentage);
//$plot->SetLegend("");
$graph->Add($plot);
$plot->value->Show();
$plot->value->SetColor("black","darkred"); 
$plot->value->SetFormat("%01.2fPC"); 

// Create the first bar
$bplot = new BarPlot($tableaupmin);
$bplot->SetFillGradient('red','darkred',GRAD_HOR);
$bplot->SetColor('darkblue');

// Create the second bar
$bplot2 = new BarPlot($tableaupmin1);
$bplot2->SetFillGradient('orange','red',GRAD_HOR);
$bplot2->SetColor('darkblue');

// Create the third bar
$bplot3 = new BarPlot($tableaupmin2);
$bplot3->SetFillGradient('yellow','orange',GRAD_HOR);
$bplot3->SetColor('darkred');

// Create the forth bar
$bplot4 = new BarPlot($tableaupmin3);
$bplot4->SetFillGradient('green','yellow',GRAD_HOR);
$bplot4->SetColor('black');

// Create the fifth bar
$bplot5 = new BarPlot($tableaupsup);
$bplot5->SetFillGradient('darkgreen','green',GRAD_HOR);
$bplot5->SetColor('black');


// And join them in an accumulated bar
$accbplot = new AccBarPlot(array($bplot,$bplot2,$bplot3,$bplot4,$bplot5));
$graph->Add($accbplot);
$graph->xaxis->SetTickLabels($tabFiliereMatieres);
$graph->xaxis->title->Set("Designation de filiere");
$graph->yaxis->title->Set("Pourcentage d'avancement (nbrMatieresTraitees/nbrMatieres)");




$filename="./graph.png";
if (file_exists($filename)) {
	unlink($filename);
	$graph->Stroke($filename);

}
else {
	$graph->Stroke($filename);
}
?>
