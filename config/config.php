<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:54
 */


//Database informations
$base="mysql:host=localhost;dbname=ToutDouxListe";
$blogin="root";
$bpassword="";


//Vues
    $vues['error']='vues/error.php';
    //visitors
        $vues['homepage']='vues/homepage.php';

        $vues['displayLists']='vues/lists.php';
        $vues['newList']='vues/newList.php';
        $vues['viewList']='vues/viewList.php';
        $vues['taskCreation']='vues/taskCreation.php';

        $vues['signup']='vues/signup.php';
        $vues['signin']='vues/signin.php';

    //users
        $vues['privateList']='vues/privateList.php';
        $vues['newPrivate']='vues/newPrivateList.php';
        $vues['viewPrivateList']='vues/viewPrivateList.php';
        $vues['newPrivateTask']='vues/newPrivateTask.php';

        $vues['connected']='vues/connectedHomepage.php';

?>