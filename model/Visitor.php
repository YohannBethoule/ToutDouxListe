<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 28/11/17
 * Time: 20:06
 */

class Visitor
{
    public static function consultPublicLists(){
        global $base, $blogin, $bpassword;
        $con=new Connexion($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $res=$list_gt->getAllPublicLists();
        return $res;
    }

    public static function insertList($list_name){
        global $base, $blogin, $bpassword;
        $con=new Connexion($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $list_gt->insert($list_name, null);
    }

    public static function deleteList($id_list){
        global $base, $blogin, $bpassword;
        $con=new Connexion($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $list_gt->delete($id_list);
    }

    public static function displayList($id_list){
        global $base, $blogin, $bpassword;
        $con=new Connexion($base, $blogin, $bpassword);
        $task_gt=new TaskGateway($con);
        $res=$task_gt->get($id_list);
        return $res;
    }
}