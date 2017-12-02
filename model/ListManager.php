<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 30/11/17
 * Time: 20:06
 */

class ListManager
{
    private $lists;

    public function __construct($res)
    {
        foreach ($res as $row){
            $this->lists[]=new ToDoList($row['id_list'],$row['list_name'],$row['username'],$row['creation_date']);
        }
    }

    public function getAll(){
        return $this->lists;
    }

    public function get($id_list){
        foreach ($this->lists as $l){
            if($l->id_list==id_list){
                return $l;
            }
        }
    }
}