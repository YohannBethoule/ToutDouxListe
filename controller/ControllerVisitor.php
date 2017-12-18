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
        $l_manager=new ListManager();
        $username=Validation::nettoyer_string($_SESSION['user']);
        if(isset($_POST[checkPrivate]) && $username!=null){
            $l_manager->insert($list_name,$username);
        }else{
            $l_manager->insert($list_name,null);
        }
        require_once($vues['homepage']);
    }

    /**
     * Gets all public lists and calls the webpage to display them.
     */
    public function consultPublicLists(){
        global $vues;
        $l_manager=new ListManager();
        $lists=$l_manager->getByUser(null);
        require_once($vues['displayLists']);
    }


    /**
     * Gets all tasks from the selected list in the database and calls the webpage to display them.
     */
    public function displayList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $list_name=Validation::nettoyer_string($_GET['list_name']);
        $l_manager=new TaskManager();
        $res=$l_manager->getTasks($id_list);
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
        $t_manager=new TaskManager();
        $t_manager->insertTask($id_list, $task_name, $latest_date);
        $l_manager=new ListManager();
        $l=$l_manager->getListById($id_list);
        $loc="Location: index.php?action=displayList&id_list=".$l->getId()."&list_name=".$l;
        header($loc);

    }


    public function deleteList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $l_manager=new ListManager();
        $l_manager->deleteList($id_list);
        require_once($vues['homepage']);
    }


    public function deleteTask(){
        global $vues;
        $id_task=Validation::nettoyer_string($_GET['id_task']);
        $t_manager=new TaskManager();
        $l=$t_manager->getList($id_task);
        $t_manager->deleteTask($id_task);
        $loc="Location: index.php?action=displayList&id_list=".$l->getId()."&list_name=".$l;
        header($loc);
    }

    public function validateTask(){
        global $vues;
        $id_task=Validation::nettoyer_int($_GET['id_task']);
        $t_manager=new TaskManager();
        $t_manager->validateTask($id_task);
        $l=$t_manager->getList($id_task);
        $loc="Location: index.php?action=displayList&id_list=".$l->getId()."&list_name=".$l;
        header($loc);
    }


    public function insertUser(){
        global $vues;
        $username=Validation::nettoyer_string($_POST['username']);
        $password=Validation::nettoyer_string($_POST['password']);
        $u_manager=new UserManager();
        $u_manager->insertUser($username, $password);
        require_once ($vues['homepage']);
    }

    public function signUp(){
        global $vues;
        require_once $vues['signup'];
    }

}