<?php
/**
 * Created by PhpStorm.
 * User: ludod
 * Date: 09/12/2017
 * Time: 08:46
 */

class ControllerUser
{

    function __construct()
    {
    }
    public function disconnect(){
        global $vues;
        session_start();
        $_SESSION['username'];
        session_destroy();

        require_once($vues['homepage']);
    }
    public function consultPrivateLists(){
        global $vues;
        $l_manager= new ListManager();
        $l_manager->getByUser($_SESSION['username']);
        require_once($vues['displayLists']);
    }
    public function deleteList(){

    }
    public function deleteTask(){

    }

}