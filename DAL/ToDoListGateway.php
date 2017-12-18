<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */

/**
 * Class ToDoListGateway is the gateway to execute SQL queries on the ToDoList table.
 */
class ToDoListGateway
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
     * Inserts a new list in the databse
     * @param $name the name of the list
     * @param $username the username of the owner of the list, null if the list is public.
     */
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

    /**
     * @return mixed all the public lists.
     */
    public function getByUser($username)
    {
        if($username==null){
            $query = 'SELECT * FROM ToDoList WHERE username IS NULL';
            $this->con->executeQuery($query);
        }else{
            $query= 'SELECT * FROM ToDoList WHERE username=:username';
            $this->con->executeQuery($query, array(
                ':username'=>array($username, PDO::PARAM_STR)
            ));
        }
        return $this->con->getResults();
    }

    public function get($id_list){
        $query= 'SELECT * FROM ToDoList WHERE id_list=:id_list';
        $this->con->executeQuery($query, array(
            ':id_list'=>array($id_list, PDO::PARAM_INT)
        ));
        return $this->con->getResults();
    }

    /**
     * Deletes a list from the database.
     * @param $id_list the id of the list
     */
    public function delete($id_list){
        $query='DELETE FROM ToDoList WHERE id_list=:id_list';
        $this->con->executeQuery($query, array(
            ':id_list'=>array($id_list, PDO::PARAM_INT)
        ));
    }
}