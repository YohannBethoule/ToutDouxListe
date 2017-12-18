<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:15
 */


class Task
{
    private $id_task;

    private $id_list;

    private $task_name;

    private $creation_date;

    private $latest_date;

    private $validation_date;

    /**
     * Task constructor.
     * @param $id_task id of the task
     * @param $id_listid of the parent list
     * @param $task_name name of the task
     * @param $creation_date
     * @param $latest_date
     */
    public function __construct($id_task, $id_list, $task_name, $creation_date, $latest_date, $validation_date){
        $this->id_task = $id_task;

        $this->id_list = $id_list;

        $this->task_name = $task_name;

        $this->creation_date = $creation_date;

        $this->latest_date = $latest_date;

        $this->validation_date = $validation_date;
    }

    /**
     * @return the name of the task
     */
    public function __toString(): String{
        return $this->task_name;
    }

    /**
     * @return mixed the id of the list
     */
    public function getList(){
        return $this->id_list;
    }

    /**
     * @return mixed the id of the task
     */
    public function getId(){
        return $this->id_task;
    }

    public function getCreationDate(){
        return $this->creation_date;
    }

    public function getValidationDate(){
        return $this->validation_date;
    }

    public function getLatestDate(){
        return $this->latest_date;
    }

    public function isValid() : bool{
        return $this->validation_date!=null;
    }
}