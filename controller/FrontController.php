<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:35
 */

/**
 * Get any request and call the right Controller to perform the required action.
 * Class FrontController
 */

class FrontController
{
    /**
     * FrontController constructor.
     * Has 2 arrays, 1 for each actor of the website, which contains every possible action for its actor.
     * For any action registered in $_REQUEST, call the right controller (visitor or user), and give it the action as parameter.
     */
    function __construct()
    {
        global $vues;
        $listAction_Visitor = array(
            'consultPublicLists',
            'createList',
            'insertList',
            'displayList',
            'deleteList',
            'addTask',
            'insertTask',
            'deleteTask',
            'validateTask',
            "signIn",
            "signUp",
            "connection",
            'insertUser');
        $listAction_User = array(
            'disconnect',
            'consultPrivateLists',
            'displayPrivateList',
            'deletePrivateList',
            'addPrivateTask',
            'deletePrivateTask',
            'validatePrivateTask');


        try {
            if (isset($_REQUEST['action'])) {
                $action = Validation::nettoyer_string($_REQUEST['action']);
            } else{
                require_once($vues['homepage']);
                return;
            }
            if(in_array($action,$listAction_User)){
                new ControllerUser($action);
            }
            else{
                new ControllerVisitor($action);
            }

        }catch (Exception $e){
            $dVueErreur = $e->getMessage();
            require_once($vues['error']);
        }
    }

}