<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:45
 */

/**
 * Class ControllerVisitor gets an action and handle it.
 */
class ControllerVisitor
{
    function __construct()
    {
    }

    /**
     * Calls the webpage to create a new list.
     */
    public function createList(){
        global  $vues;
        require_once($vues['newList']);
    }

    /**
     * Insert a new list in the database.
     */
    public function insertList(){
        global $vues;
        $list_name=Validation::nettoyer_string($_POST['list_name']);
        Visitor::insertList($list_name);
        require_once($vues['homepage']);
    }

    /**
     * Gets all public lists and calls the webpage to display them.
     */
    public function consultPublicLists(){
        global $vues;
        $res=Visitor::consultPublicLists();
        require_once($vues['displayLists']);
    }


    /**
     * Gets all tasks from the selected list in the database and calls the webpage to display them.
     */
    public function displayList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $list_name=Validation::nettoyer_string($_GET['list_name']);
        $res=Visitor::displayList($id_list);
        require_once($vues['viewList']);
    }

    /**
     * Calls the webpage to add a task to the selected list.
     */
    public function addTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        require_once($vues['taskCreation']);
    }

    /**
     * Insert a new task in the database.
     */
    public function insertTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $task_name=Validation::nettoyer_string($_POST['task_name']);
        $latest_date=$_POST['latest_date'];
        Visitor::insertTask($id_list, $task_name, $latest_date);
        require_once($vues['homepage']);
    }

    public function insertUser(){
        $username=Validation::nettoyer_string($_POST['username']);
        $password=Validation::nettoyer_string($_POST['password']);
        Visitor::insertUser($username, $password);
    }

    public function signUp(){
        global $vues;
        require_once $vues['signup'];
    }

    public  function signIn(){
        global $vues;
        require_once $vues['signin'];
    }

    public function connection(){
        $username=Validation::nettoyer_string($_POST['username']);
        $password=Validation::nettoyer_string($_POST['password']);
        User::connection($username, $password);
    }
}