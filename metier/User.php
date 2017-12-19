<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:15
 */


class User
{
    private $username;

    public function __construct($username){
        $this->username = $username;
        $this->password = $password;
    }


    /**
     * @return username of the user
     */
    public function getUsername()
    {
        return $this->username;
    }



}