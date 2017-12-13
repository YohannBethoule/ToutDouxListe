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
    private $password;
    private $isAdmin;

    public function __construct($username,$pass,$admin){
        $this->username = $username;
        $this->password = $pass;
        $this->isAdmin = $admin;
    }

    /**
     * @return isAdmin the user is admin (0) or not (1)
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }
    /**
     * @return username of the user
     */
    public function getUsername()
    {
        return $this->username;
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
    public static function consultPrivateLists(){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $list_gt=new PrivateListGateway($con);
        $list_manager=new ListManager($list_gt->getAllsts());
        return $list_manager->getAll();
    }

    public static function displayPrivateList($id_list){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new PrivateTaskGateway($con);
        $res=$task_gt->get($id_list);
        return $res;
    }
    public static function insertPrivateTask($id_list, $task_name, $latest_date, $username){
        global $base, $blogin, $bpassword;
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new PrivateTaskGateway($con);
        $task_gt->privateInsert($task_name, $id_list, $username, $latest_date);
    }
    public static function deletePublicList($id_list){
        global $base, $blogin, $bpassword,$vues;
        $con=new Connection($base, $blogin, $bpassword);
        $gw_user=new UserGateway($con);
        $Found=$gw_user->search($_SESSION['user']);
        $userFound = new User($Found[0],$Found[1],$Found[2]);
        if($userFound->getisAdmin()!=0){
            require($vues['erreur']);
        }
        $list_gt=new ToDoListGateway($con);
        $list_gt->delete($id_list);
    }

    public static function deletePublicTask($id_task){
        global $base, $blogin, $bpassword, $vues;
        $con=new Connection($base, $blogin, $bpassword);
        $gw_user=new UserGateway($con);
        $Found=$gw_user->search($_SESSION['user']);
        $userFound = new User($Found[0],$Found[1],$Found[2]);
        if($userFound->getisAdmin()!=0){
            require($vues['erreur']);
        }
        $con=new Connection($base, $blogin, $bpassword);
        $task_gt=new TaskGateway($con);
        $task_gt->delete($id_task);
    }
}