<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 16/12/17
 * Time: 09:38
 */

class UserManager
{
    private $list_gt;
    private $user_gt;
    private $task_gt;


    public function __construct()
    {
        global $base, $blogin, $bpassword,$vues;
        $con=new Connection($base, $blogin, $bpassword);
        $this->list_gt=new ToDoListGateway($con);
        $this->user_gt=new UserGateway($con);
        $this->task_gt=new TaskGateway($con);
    }

    public static function connection($username, $password)
    {
        global $blogin,$bpassword,$base, $vues;
        $con=new Connection($base,$blogin,$bpassword);
        $user_gt=new UserGateway($con);
        $user= $user_gt->search($username);
        if(empty($user))
        {
            $dVuesErreur[]="Le pseudonyme n'est pas reconnu";
            return false;
        }
        else
        {
            if($user['password']!=$password)
            {
                $dVuesErreur[]="Le mot de passe est incorrect";
                return false;
            }
            else
            {
                $_SESSION['user']=$user['username'];
                return true;
            }
        }
    }


    public static function insertUser($username, $password){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $user_gt=new UserGateway($con);
        $user_gt->insert($username, $password );
    }
}