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

    public function get($id_list){
        foreach ($this->lists as $l){
            if($l->id_list==$id_list){
                return $l;
            }
        }
    }

    public function getByUser($username){
        $res=$this->list_gt->getByUser($username);
        foreach ($res as $row){
            $this->lists[]=new ToDoList($row['id_list'],$row['list_name'],null,$row['creation_date']);
        }
    }

    public function deletePublicList($id_list){
        $this->list_gt->delete($id_list);
    }


    public function insert($list_name, $username){
        $this->list_gt->insert($list_name, $username);
    }
}