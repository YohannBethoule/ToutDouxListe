<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:45
 */

//namespace controller;


class ControllerVisitor
{
    function __construct($action)
    {
        global $rep,$vues;
        $dVueErreur = array ();

        try {
            //switch des différentes actions pouvant être requises par le visiteur. Dans chaque cas, on appelle la méthode associée à l'action.
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

    private function createList(){
        global $rep, $vues;
        require_once($vues['newList']);
    }

    private function insertList(){
        global $vues;
        $list_name=Validation::nettoyer_string($_POST['list_name']);
        Visitor::insertList($list_name);
        require_once($vues['homepage']);
    }

    private function consultPublicLists(){
        global $rep, $vues;
        $res=Visitor::consultPublicLists();
        require_once($vues['displayLists']);
    }

    private function deleteList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        Visitor::deleteList($id_list);
        require_once($vues['homepage']);
    }

    private function displayList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $list_name=Validation::nettoyer_string($_GET['list_name']);
        $res=Visitor::displayList($id_list);
        require_once($vues['viewList']);
    }

    private function addTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        require_once($vues['taskCreation']);
    }

    private function insertTask(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        $task_name=Validation::nettoyer_string($_POST['task_name']);
        $latest_date=$_POST['latest_date'];
        Visitor::insertTask($id_list, $task_name, $latest_date);
        require_once($vues['homepage']);
    }
}