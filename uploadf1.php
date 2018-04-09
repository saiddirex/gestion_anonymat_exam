<?php
/**
 * Created by Youssef Elhanafi.
 * Date: 11/05/2016
 * Time: 02:35
 */


if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];
    /*   echo $type_file;
       echo '</br>';
       echo strstr($type_file,'excel');
       echo '</br>';
   */
       /*
    if( !strstr($type_file, 'excel')  )
    {
        exit("fichier incompatible");
    }
*/
    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];
    $name_file='Fichier_Administration.xls'; //forcer un nom au fichier

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }
    echo "Le fichier a bien été uploadé";
    header ('location:readf1.php'); //redirection a la page import

}

?>


