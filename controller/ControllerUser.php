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

    /**
     * Disconnect the current user by unsetting the $_SESSION variable.
     */
    public function disconnect(){
        global $vues;
        session_unset();
        require_once($vues['homepage']);
    }


    public function consultPrivateLists(){
        global $vues;
        $l_manager= new ListManager();
        $username=Validation::nettoyer_string($_SESSION['user']);
        $l_manager->getByUser($username);
        require_once($vues['displayLists']);
    }
}