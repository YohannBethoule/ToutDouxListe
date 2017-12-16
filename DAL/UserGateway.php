<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */

/**
 * Class UserGateway is the gateway to execute SQL queries on the User table.
 */
class UserGateway
{
    /**
     * @var Connexion connexion to the database
     */
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    /**
     * Inserts a new username in the databse
     * @param $username
     * @param $password
     */
    public function insert($username, $password){
        $query='INSERT INTO User VALUES(:username, :password)';
        $this->con->executeQuery($query, array(
            ':username'=>array($username, PDO::PARAM_STR),
            ':password'=>array($password, PDO::PARAM_STR)
        ));
    }

    public function search($username){
        $query='SELECT * FROM User WHERE username=:username';
        $this->con->executeQuery($query, array(
            ':username'=>array($username, PDO::PARAM_STR)
        ));
        $user=$this->con->getResults();
        if(isset($user) && $user!=null)
            $user=$user[0];
        return $user;
    }
}