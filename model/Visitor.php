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
        $con=new Connection($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $list_manager=new ListManager($list_gt->getAllPublicLists());
        return $list_manager->getAll();
    }

    public static function insertList($list_name){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $list_gt->insert($list_name, null);
    }

    public static function deleteList($id_list){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $list_gt->delete($id_list);
    }

    public static function displayList($id_list){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new TaskGateway($con);
        $res=$task_gt->get($id_list);
        return $res;
    }

    public static function insertTask($id_list, $task_name, $latest_date){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new TaskGateway($con);
        $task_gt->insert($task_name, $id_list, null, $latest_date);
    }

    public static function deleteTask($id_task){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new TaskGateway($con);
        $task_gt->delete($id_task);
    }

    public static function insertUser($username, $password){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $user_gt=new UserGateway($con);
        $user_gt->insert($username, $password);
    }
}