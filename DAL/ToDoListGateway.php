<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */


class ToDoListGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($name, $username)
    {
        $query='INSERT INTO ToDoList VALUES(NULL, :list_name, :username, now())';
        if(!isset($username)){
            $this->con->executeQuery($query, array(
                ':list_name'=>array($name, \PDO::PARAM_STR),
                ':username'=>array($username, \PDO::PARAM_NULL)
        ));
        }else{
            $this->con->executeQuery($query, array(
                ':list_name'=>array($name, \PDO::PARAM_STR),
                ':username'=>array($username, \PDO::PARAM_STR)
        ));
        }
    }

    public function getAllPublicLists()
    {
        $query = 'SELECT * FROM ToDoList WHERE username IS NULL';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }
}