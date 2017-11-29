<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:54
 */
$rep="/opt/lampp/htdocs/ToutDouxListe/";

//BD

$base="mysql:host=localhost;dbname=ToutDouxListe";
$blogin="root";
$bpassword="";


//Vues

$vues['homepage']='vues/homepage.php';
$vues['erreur']='vues/error.php';
$vues['displayLists']='vues/lists.php';
$vues['newList']='vues/newList.php';
$vues['viewList']='vues/viewList.php';

?>