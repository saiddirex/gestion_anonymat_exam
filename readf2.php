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


$extension=pathinfo("upload/Fichier_Profs.xls",PATHINFO_EXTENSION);
if ($extension="xls"){
    $objReader = PHPExcel_IOFactory::createReader('Excel5');
    $objPHPExcel = $objReader->load("upload/Fichier_Profs.xls");

}
elseif($extension="xlsx"){
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("upload/pourprofs.xlsx");

}
//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
//


//
for ($row=1;$row<=$highestRow;++$row) {
    for ($x = 1; $x < 4; $x++) {
        $rows[$x] = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($x,$row);
    }



    $sql="UPDATE notes set note_cc='$rows[2]', note_cf='$rows[3]' WHERE CodeAnonyme='".$rows[1]."' and  NumMatiere = '".$m."'";
    $req=mysqli_query($db,$sql)
    or die (mysqli_error($db));


}
$reqetat = "SELECT etat FROM matieres Where NumMatiere = '$m'";
$resultatetat = mysqli_query($db,$reqetat);
$rowetat = mysqli_fetch_array($resultatetat,MYSQLI_ASSOC);
$etat = $rowetat['etat'];
if($etat==3)
{
    $reqetatupdate = "UPDATE matieres SET etat = 4 where NumMatiere = '$m'";
    $resultatetatupdate = mysqli_query($db,$reqetatupdate);
}

$tache = "Attachement de La liste des notes";
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




?>



