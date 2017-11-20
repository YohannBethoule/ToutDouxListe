<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */

namespace DAL;


use model\Connexion;

class TaskGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($name, $id_list, $username, $latest_date)
    {
        $query='INSERT INTO Task VALUES(:id_list, :username, :task_name, SELECT SYSDATE FROM DUAL, to_date($latest_date, "DD/MM/YY"), NULL))';
        $args=array(
            ':id_list'=>array($id_list, \PDO::PARAM_STR),
            ':task_name'=>$name,
            ':latest_date'=>$latest_date
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

    public function validate($id_task)
    {
        $query='UPDATE Task SET validation_date=SELECT SYSDATE FROM DUAL WHERE id_task=:id_task';
        $this->con->executeQuery($query, array(
            ':id_task'=>array($id_task, \PDO::PARAM_INT)
        ));
    }
}