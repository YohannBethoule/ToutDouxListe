<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 20/11/17
 * Time: 19:15
 */


class User
{
    public static function connection($username, $password)
    {
        global $blogin,$bpassword,$base;
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
}