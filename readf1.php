<?php
/**
 * Created by Youssef Elhanafi.
 * Date: 25/05/2016
 * Time: 10:45
 */
require("session.php");
require_once('PHPExcel/Classes/PHPExcel.php');

if (isset($_GET['m']) && !empty($_GET['m'])) {
    $m = $_GET['m'];
}
else {
    header('Location:choix.php');
    exit();
}

$extension=pathinfo("upload/Fichier_Administration.xls",PATHINFO_EXTENSION);
if ($extension="xls"){
    $objReader = PHPExcel_IOFactory::createReader('Excel5');
    $objPHPExcel = $objReader->load("upload/Fichier_Administration.xls");
}
elseif($extension="xlsx"){
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("Fichier_Administration.xlsx");

}
//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
//
$nummat = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, 3) ;
global $NumMat;
$NumMat= chop($nummat,".txt");

$sql="select NumFilliere from modules,matieres where NumMatiere like '%$NumMat%' and matieres.NumModule=modules.NumModule";
$req=mysqli_query($db,$sql)or die (mysqli_error($db));
$row1 = mysqli_fetch_assoc($req);
$numfil=implode(' ',$row1);
//echo $numfil,'</br>';

//
for ($row=18;$row<=$highestRow;++$row) {
    for ($x = 0; $x < 4; $x++) {
        $rows[$x] = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($x,$row);
    }
    $date=date('Y-m-d',strtotime($rows[3]));

    $sqltest = "SELECT * FROM etudiants WHERE NumApogee = '$rows[0]'";
    $resulttest = mysqli_query($db,$sqltest);
    $rowtest = mysqli_fetch_array($resulttest,MYSQLI_ASSOC);
    if(count($rowtest)==0)
    {
    $sql="INSERT INTO etudiants(NumApogee,NumFilliere,Nom,Prenom,DateNaissance) VALUES ('".$rows[0]."',
                                                                                        '".$numfil."',
                                                                                        '".$rows[1]."',
                                                                                        '".$rows[2]."',
                                                                                        '".$date."'
                                                                                       )";

    $req=mysqli_query($db,$sql)
    or die (mysqli_error($db));
    $sql2="INSERT INTO notes(NumApogee,NumMatiere,Note_cc,CodeAnonyme,Note_cf) VALUES ('".$rows[0]."','".$NumMat."','0','','0')";
    $req2=mysqli_query($db,$sql2)
    or die (mysqli_error($db));
}

}

$reqetat = "SELECT etat FROM matieres Where NumMatiere = '$NumMat'";
$resultatetat = mysqli_query($db,$reqetat);
$rowetat = mysqli_fetch_array($resultatetat,MYSQLI_ASSOC);
$etat = $rowetat['etat'];
if($etat==0)
{
    $reqetatupdate = "UPDATE matieres SET etat = 1 where NumMatiere = '$NumMat'";
    $resultatetatupdate = mysqli_query($db,$reqetatupdate);
}

$tache = "Attachement de La liste des etudiants";
$date = date("Y-m-d H:i:s");
$username = $_SESSION['username'];

$req1 = "SELECT * FROM matieres WHERE NumMatiere = '$NumMat'";
$resultat1 = mysqli_query($db,$req1);
$row1 = mysqli_fetch_array($resultat1,MYSQLI_ASSOC);
$matiere = $row1['DesignationMatiere'];
$numModule = $row1['NumModule'];



$req2 = "SELECT * FROM modules WHERE NumModule = '$numModule'";
$resultat2 = mysqli_query($db,$req2);
$row2 = mysqli_fetch_array($resultat2,MYSQLI_ASSOC);

$module = $row2['DesignationModule'];
$numFiliere = $row2['numFilliere'];
$semestre = $row2['Semestre'];

$req3 = "SELECT * FROM fillieres WHERE NumFilliere = '$numFiliere'";
$resultat3 = mysqli_query($db,$req3);
$row3 = mysqli_fetch_array($resultat3,MYSQLI_ASSOC);
$filiere = $row3['DesignationFilliere'];


$req = "INSERT INTO historiques(`username`, `tache`, `date_de_la_tache`, `designation_matiere`, `designation_module`, `designation_filiere`, `semestre`) VALUES ('$username','$tache','$date','$matiere','$module','$filiere','$semestre')" ;

$result = mysqli_query($db,$req);



// remplissage du code anonyme
include('param.php');
header('location:choix.php');


?>



