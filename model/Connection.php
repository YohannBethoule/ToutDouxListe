<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 22:32
 */


/**
 * Class Connection Connection to the database
 */
class Connection extends PDO
{
    private $stmt;

    /**
     * Connection constructor. Constructs a PDO connection to the database.
     * @param $dsn the databse name
     * @param $username the username to the database
     * @param $password the password to the database
     */
    public function __construct($dsn,$username,$password){
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Executes a query into the database
     * @param $query the SQL query to be executed
     * @param array $parameters parameters to the query
     * @return bool true if the query went ok, false if not.
     */
    public function executeQuery($query,array $parameters = []){
        //Peut utiliser try catch avec
        $this->stmt=parent::prepare($query);
        foreach ($parameters as $name => $value){
            $this->stmt->bindValue($name,$value[0],$value[1]);
        }
        return $this->stmt->execute();

    }

    /**
     * @return mixed the results of the query as an array
     */
    public function getResults(){
        return $this->stmt->fetchall();
    }

}