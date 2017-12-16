<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 30/11/17
 * Time: 20:20
 */

class TaskManager
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

    public function getTasks($id_list)
    {
        $res=$this->task_gt->get($id_list);
        foreach ($res as $row)
        {
            $tasks[]=new Task($row['id_task'], $row['id_list'], $row['task_name'],
                $row['username'], $row['creation_date'], $row['latest_date']);
        }
        return $tasks;
    }

    public function deletePublicTask($id_task){
        $this->task_gt->delete($id_task);
    }

    public function insertTask($id_list, $task_name, $latest_date){
        $this->task_gt->insert($task_name, $id_list, null, $latest_date);
    }
}