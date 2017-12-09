<?php
/**
 * Created by PhpStorm.
 * User: ludod
 * Date: 09/12/2017
 * Time: 13:45
 */

class PrivateTaskGateway
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
    public function privateInsert($name, $id_list, $latest_date)
    {
        $gw_user=new UserGateway($this->con);
        $found=$gw_user->search($_SESSION['user']);
        $username=$found[0];
        $query='INSERT INTO PrivateTask VALUES(NULL, :id_list, :username, :task_name, now(), :latest_date, NULL)';
        $args=array(
            ':id_list'=>array($id_list, \PDO::PARAM_INT),
            ':task_name'=>array($name, PDO::PARAM_STR),
            ':latest_date'=>array($latest_date, PDO::PARAM_STR),
            ':username'=>array($username, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $args);
    }

    /**
     * Gets all tasks from a list
     * @param $id_list the id of the list
     * @return mixed an array containing the results of the query.
     */
    public function getPrivateList($id_list){
        $query='SELECT * FROM PrivateTask WHERE id_list=:id_list';
        $this->con->executeQuery($query, array(
            ':id_list'=>array($id_list, PDO::PARAM_INT)
        ));
        return $this->con->getResults();
    }


    public function deletePrivateTask($id_task){
        $query='DELETE FROM PrivateTask WHERE id_task=:id_task';
        $this->con->executeQuery($query, array(
            ':id_task'=>array($id_task, PDO::PARAM_INT)
        ));
    }
}