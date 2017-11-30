<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */

/**
 * Class TaskGateway is the gateway to execute SQL queries on the Task table.
 */
class TaskGateway
{
    /**
     * @var Connection a connection to the database
     */
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    /**
     * Insert a new row the the table.
     * @param $name the name of the task
     * @param $id_list the list to which the task belongs
     * @param $username the username of the user who owns the list, null if the list is public
     * @param $latest_date the latest_date to validate the task
     */
    public function insert($name, $id_list, $username, $latest_date)
    {
        $query='INSERT INTO Task VALUES(NULL, :id_list, :username, :task_name, now(), :latest_date, NULL)';
        $args=array(
            ':id_list'=>array($id_list, \PDO::PARAM_INT),
            ':task_name'=>array($name, PDO::PARAM_STR),
            ':latest_date'=>array($latest_date, PDO::PARAM_STR)
        );
        if(!isset($username))
        {
            $args[':username']=\PDO::PARAM_NULL;
        }else
        {
            $args[':username']=array($username, \PDO::PARAM_STR);
        }
        $this->con->executeQuery($query, $args);
    }

    /**
     * Gets all tasks from a list
     * @param $id_list the id of the list
     * @return mixed an array containing the results of the query.
     */
    public function get($id_list){
        $query='SELECT * FROM Task WHERE id_list=:id_list';
        $this->con->executeQuery($query, array(
            ':id_list'=>array($id_list, PDO::PARAM_INT)
        ));
        return $this->con->getResults();
    }

    public function delete($id_task){
        $query='DELETE FROM Task WHERE id_task=:id_task';
        $this->con->executeQuery($query, array(
            ':id_task'=>array($id_task, PDO::PARAM_INT)
        ));
    }

/*
    public function validate($id_task)
    {
        $query='UPDATE Task SET validation_date=SELECT SYSDATE FROM DUAL WHERE id_task=:id_task';
        $this->con->executeQuery($query, array(
            ':id_task'=>array($id_task, \PDO::PARAM_INT)
        ));
    }*/
}