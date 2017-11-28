<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:35
 */

//namespace controller;


class FrontController
{
    function __construct()
    {
        global $vues;
        $listAction_Visitor = array(
            'consultPublicLists',
            'createList',
            'insertList',
            'displayPublicList',
            'deletePublicList',
            'addPublicTask',
            'deletePublicTask',
            'validatePublicTask');
        $listAction_User = array(
            'connection',
            'authentification',
            'disconnect',
            'consultPrivateLists',
            'displayPrivateList',
            'deletePrivateList',
            'addPrivateTask',
            'deletePrivateTask',
            'validatePrivateTask');


        try {
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
                $action = Validation::nettoyer_string($action);
            } else{
                require_once($vues['homepage']);
                return;
            }
            if(in_array($action, $listAction_Visitor)){
                switch ($action){
                    case "consultPublicLists":
                        new ControllerVisitor("consultPublicLists");
                        break;
                    case "createList":
                        new ControllerVisitor("createList");
                        break;
                    case "insertList":
                        new ControllerVisitor("insertList");
                }
            }
            if(in_array($action,$listAction_User)){
                if(!ModelUser::isUser())
                    if ($action == "authentification")
                        new ControllerUser("authentification");
                    else
                        new ControllerUser("connection");
                else
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