<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 22:32
 */

namespace model;


class Connexion
{
    private $stmt;

    public function __construct($dsn,$username,$password){
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query,array $parameters = []){
        //Peut utiliser try catch avec
        $this->stmt=parent::prepare($query);
        foreach ($parameters as $name => $value){
            $this->stmt->bindValue($name,$value[0],$value[1]);
        }
        return $this->stmt->execute();

    }

    public function getResults(){
        return $this->stmt->fetchall();
    }

}