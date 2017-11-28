<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 28/11/17
 * Time: 20:06
 */

class Visitor
{
    public static function consultPublicLists(){
        global $base, $blogin, $bpassword;
        $con=new Connexion($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $res=$list_gt->getAllPublicLists();
        return $res;
    }

    public static function insertList($list_name){
        global $base, $blogin, $bpassword;
        $con=new Connexion($base, $blogin, $bpassword);
        $list_gt=new ToDoListGateway($con);
        $list_gt->insert($list_name, null);
    }
}