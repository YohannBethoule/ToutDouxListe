<?php
/**
 * Created by PhpStorm.
 * User: ludod
 * Date: 09/12/2017
 * Time: 09:27
 */

class PrivateListGateway
{
    /**
     * @var Connection a connection to the database
     */
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }
    public function getAllPrivateLists()
    {
        $query = 'SELECT * FROM PrivateList WHERE username=:username';
        $gw_user = new UserGateway($this->con);
        $userfound =$gw_user->search($_SESSION['user']);
        $username=$userfound->username;
        $this->con->executeQuery($query,array(
            ':username'=>array($username, PDO::PARAM_STR)
        ));
        return $this->con->getResults();
    }
}