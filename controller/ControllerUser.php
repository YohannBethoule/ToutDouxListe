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


    public  function signIn(){
        global $vues;
        require_once $vues['signin'];
    }

    public function connection(){
        global $vues;
        $username=Validation::nettoyer_string($_POST['username']);
        $password=Validation::nettoyer_string($_POST['password']);
        $u_manager=new UserManager();
        if($u_manager->connection($username, $password)){
            require_once($vues['homepage']);
        }else{
            require_once($vues['error']);
        }
    }

    public function disconnect(){
        global $vues;
        session_unset();

        require_once($vues['homepage']);
    }
    public function consultPrivateLists(){
        global $vues;
        $l_manager= new ListManager();
        $l_manager->getByUser($_SESSION['user']);
        require_once($vues['displayLists']);
    }
    public function deleteList(){

    }
    public function deleteTask(){

    }

}