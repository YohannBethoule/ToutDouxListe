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
    function __construct($action)
    {
        global $rep,$vues;
        $dVueErreur = array ();

        try {
            switch ($action) {
                case "consultPublicLists":
                    $this->consultPublicLists();
                    break;

                case "createList":
                    $this->createList();
                    break;

                case "insertList":
                    $this->insertList();
                    break;

                case "displayList":
                    $this->displayList();
                    break;

                case "deleteList":
                    $this->deleteList();
                    break;

                case "addTask":
                    $this->addTask();
                    break;

                case "insertTask":
                    $this->insertTask();
                    break;

                case "deleteTask":
                    $this->deleteTask();
                    break;

                case "validateTask":
                    $this->validateTask();
                    break;

                case 'signIn':
                    $this->signIn();
                    break;

                case "insertUser":
                    $this->insertUser();
                    break;

                case "signUp":
                    $this->signUp();
                    break;

                case "connection":
                    $this->connection();
                    break;


                default:
                    $dVueErreur = "Erreur d'appel php.";
                    require($rep.$vues['erreur']);
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueErreur[] =	"Erreur BDD :".$e->getMessage();
            require ($rep.$vues['erreur']);
        }

        catch (Exception $e2)
        {
            $dVueErreur[] =	"Erreur : ".$e2->getMessage();
            require ($rep.$vues['erreur']);
        }

        exit(0);
    }

    /**
     * Calls the webpage to create a new list.
     */
    private function createList(){
        global $rep, $vues;
        require_once($vues['newList']);
    }

    /**
     * Insert a new list in the database.
     */
    private function insertList(){
        global $vues;
        $list_name=Validation::nettoyer_string($_POST['list_name']);
        Visitor::insertList($list_name);
        require_once($vues['homepage']);
    }

    /**
     * Gets all public lists and calls the webpage to display them.
     */
    private function consultPublicLists(){
        global $vues;
        $res=Visitor::consultPublicLists();
        require_once($vues['displayLists']);
    }

    /**
     * Deletes a list from the database.
     */
    private function deleteList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        Visitor::deleteList($id_list);
        require_once($vues['homepage']);
    }

    /**
     * Gets all tasks from the selected list in the database and calls the webpage to display them.
     */
    private function displayList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $list_name=Validation::nettoyer_string($_GET['list_name']);
        $res=Visitor::displayList($id_list);
        require_once($vues['viewList']);
    }

    /**
     * Calls the webpage to add a task to the selected list.
     */
    private function addTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        require_once($vues['taskCreation']);
    }

    /**
     * Insert a new task in the database.
     */
    private function insertTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $task_name=Validation::nettoyer_string($_POST['task_name']);
        $latest_date=$_POST['latest_date'];
        Visitor::insertTask($id_list, $task_name, $latest_date);
        require_once($vues['homepage']);
    }

    private function deleteTask(){
        global $vues;
        $id_task=Validation::nettoyer_string($_GET['id_task']);
        Visitor::deleteTask($id_task);
        require_once $vues['homepage'];
    }

    private function insertUser(){
        $username=Validation::nettoyer_string($_POST['username']);
        $password=Validation::nettoyer_string($_POST['password']);
        Visitor::insertUser($username, $password);
    }

    private function signUp(){
        global $vues;
        require_once $vues['signup'];
    }

    private  function signIn(){
        global $vues;
        require_once $vues['signin'];
    }

    private function connection(){
        $username=Validation::nettoyer_string($_POST['username']);
        $password=Validation::nettoyer_string($_POST['password']);
        User::connection($username, $password);
    }
}