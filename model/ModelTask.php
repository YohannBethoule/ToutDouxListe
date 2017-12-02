<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 02/12/17
 * Time: 09:36
 */

class ModelTask
{
    private $tasks;

    private $con;

    public function __construct()
    {
        global $base, $blogin, $bpassword;

        
    }

    public function ($id_list)
    {
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new TaskGateway($con);
        $res=$task_gt->get($id_list);
        foreach ($res as $row)
        {
            $this->tasks[]=new Task($row['id_task'], $row['id_list'], $row['task_name'],
                $row['username'], $row['creation_date'], $row['latest_date']);
        }
        return $res;
    }

    public function getTasks()
    {
        return $this->tasks;
    }
}