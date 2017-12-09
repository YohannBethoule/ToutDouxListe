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

        require_once($vues['homepage']);
    }
    public function consultPrivateLists(){
        global $vues;
        require_once($vues['privateList']);
    }
    public function displayPrivateList(){

    }
    public function deletePrivateTask(){

    }
    public function addPrivateTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $task_name=Validation::nettoyer_string($_POST['task_name']);
        $latest_date=$_POST['latest_date'];
        User::privateInsert($id_list, $task_name, $latest_date);
        require_once($vues['connected']);
    }
    public function deletePrivateList(){

    }
    public function validatePrivateTask(){

    }
}