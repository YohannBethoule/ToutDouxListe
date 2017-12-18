<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 30/11/17
 * Time: 20:06
 */

class ListManager
{
    private $list_gt;
    private $user_gt;
    private $task_gt;


    public function __construct()
    {
        global $base, $blogin, $bpassword,$vues;
        $con=new Connection($base, $blogin, $bpassword);
        $this->list_gt=new ToDoListGateway($con);
        $this->user_gt=new UserGateway($con);
        $this->task_gt=new TaskGateway($con);
    }

    public function getAll(){
        return $this->lists;
    }

    public function getListById($id_list){
        $res=$this->list_gt->get($id_list);
        $res=$res[0];
        return new ToDoList($res['id_list'], $res['list_name'], $res['username'], $res['creationDate']);
    }

    public function getByUser($username){
        $res=$this->list_gt->getByUser($username);
        foreach ($res as $row){
            $this->lists[]=new ToDoList($row['id_list'],$row['list_name'],null,$row['creation_date']);
        }
    }

    public function deleteList($id_list){
        $this->list_gt->delete($id_list);
    }


    public function insert($list_name, $username){
        $this->list_gt->insert($list_name, $username);
    }
}