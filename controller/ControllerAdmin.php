<?php
/**
 * Created by PhpStorm.
 * User: ludod
 * Date: 08/12/2017
 * Time: 13:54
 */

class ControllerAdmin
{
    function __construct()
    {
    }
    /**
     * Deletes a list from the database.
     */
    public function deleteList(){
        global $vues;
        $id_list=Validation::nettoyer_int($_GET['id_list']);
        User::deletePublicList($id_list);
        require_once($vues['homepage']);
    }

    public function deleteTask(){
        global $vues;
        $id_task=Validation::nettoyer_string($_GET['id_task']);
        User::deletePublicTask($id_task);
        require_once $vues['homepage'];
    }

}
