<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:15
 */


class ToDoList
{
    private $id_list;

    private $list_name;

    private $username;

    private $creation_date;

    /**
     * ToDoList constructor.
     * @param $id_list
     * @param $list_name
     * @param $username
     * @param $creation_date
     */
    public function __construct($id_list, $list_name, $username, $creation_date)
    {
        $this->id_list=$id_list;

        $this->list_name=$list_name;

        $this->username=$username;

        $this->creation_date=$creation_date;
    }

    /**
     * @return mixed the id of the list
     */
    public function getId()
    {
        return $this->id_list;
    }

    /**
     * @return String the name of the list
     */
    public function __toString():String
    {
        return $this->list_name;
    }

    /**
     * @return bool true if the username is null
     */
    public function isPublic() : Boolean
    {
        return $this->username==null;
    }

    public function getCreation_Date()
    {
        return $this->creation_date;
    }

}