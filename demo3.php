<?php

//processing form submitted
 
//if (!isset($_POST['btnSubmit'])) exit;
 
//include PHPExcel library
//require("session.php");
require('connexion.php');
require_once "PHPExcel/Classes/PHPExcel/IOFactory.php";
require_once('PHPExcel/Classes/PHPExcel.php');
 
//load Excel template file

if (isset($_GET['m']) && !empty($_GET['m'])) {
    $m = $_GET['m'];
}
else {
    header('Location:choix.php');
    exit();
}


//
$objReader = PHPExcel_IOFactory::createReader('Excel5');
    $objPHPExcel = $objReader->load("upload/Fichier_Administration.xls");
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
//
//
$query = "select Nom,note_cc,note_cf from etudiants,notes where etudiants.NumApogee=notes.NumApogee order by Nom";
$result = mysqli_query($db,$query);

//while($row = mysqli_fetch_array($result)) {
   for ($rowx=18;$rowx<=$highestRow;++$rowx) {
    $row = mysqli_fetch_array($result);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowx,$row['note_cc'] );
    //$objPHPExcel->getActiveSheet()->getStyle('E'.$rowx)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); //C1 is right-justified
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowx,$row['note_cf'] );
   //   $objPHPExcel->getActiveSheet()->getStyle('G'.$rowx)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); //C1 is right-justified


   }


 
//prepare download

$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
//
$nummat = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, 3) ;
$nm= chop($nummat,".txt");

//prepare download
$filename='Notes_'.$nm.'.xls'; //just some random filename
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
 
$objPHPExcel = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //downloadable file is in Excel 2003 format (.xls)
$objPHPExcel->save('php://output'); 
$reqetat = "SELECT etat FROM matieres Where NumMatiere = '$m'";
$resultatetat = mysqli_query($db,$reqetat);
$rowetat = mysqli_fetch_array($resultatetat,MYSQLI_ASSOC);
$etat = $rowetat['etat'];
if($etat==4)
{
    $reqetatupdate = "UPDATE matieres SET etat = 5 where NumMatiere = '$m'";
    $resultatetatupdate = mysqli_query($db,$reqetatupdate);
}

$tache = "Telechargement de la liste finale avec note ";
$date = date("Y-m-d H:i:s");
$username = $_SESSION['username'];

$req1 = "SELECT * FROM matieres WHERE NumMatiere = '$m'";
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
 //send it to user, of course you can save it to disk also!
 
exit; //done.. exiting!

?>