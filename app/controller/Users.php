<?php

namespace app\controller;

use PDO;
use Exception;
use app\model\Users as UsersModel;

class Users extends Controller
{

    public function index()
    {
        $users = new UsersModel();
        $users = $users->all();
        $this->view('pub.index',compact('users'));
    }
    public function find_user($username)
    {
        $user = new UsersModel();
        $the_user = $user->find($username);
        var_dump($the_user);
    }

    public function delete_user($id)
    {
        $user = new UsersModel();
        $user_exist = $user->find_by_id($id);
        if ($user_exist == false){
            echo "there is no users by id $id";
        }else{
            $user->delete_by_id($id);
            echo "the $id user has deleted";
        }
    }

    public function delete_by_username($username)
    {
        $user = new UsersModel();
        $user_exist = $user->find($username);
        if ($user_exist == false){
            echo "there is no users by id $username";
        }else{
            $user->delete_by_username($username);
            echo "the $username user has deleted";
        }
    }
}
