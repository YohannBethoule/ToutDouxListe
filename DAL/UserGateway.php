<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:14
 */

namespace DAL;


use model\Connexion;

class UserGateway
{
    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    public function insert($username, $password, $mail){
        $query='INSERT INTO User VALUES(:username, :password, :mail)';
        $this->con->executeQuery($query, array(
            ':username'=>array($username, PDO::PARAM_STR),
            ':password'=>array($password, PDO::PARAM_STR),
            ':mail'=>array($mail, PDO::PARAM_STR)
        ));
    }

    public function search($username){
        $query='SELECT * FROM user WHERE username=:username';
        $this->con->executeQuery($query, array(
            ':username'=>array($username, PDO::PARAM_STR)
        ));
        $user=$this->con->getResults();
        if(isset($user) && $user!=null)
            $user=$user[0];
        return $user;
    }
}