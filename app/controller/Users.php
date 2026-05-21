<?php

namespace app\controller;

use PDO;
use Exception;
use app\model\Users as UsersModel;

class Users extends Controller
{
    public function login()
    {
        $err = [];
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $users = new UsersModel();
            $current_user = $users->find_by_email($_POST['email']);
            if ($current_user) {
                if ($current_user->password == $_POST['password']) {
                    $_SESSION['login'] = $current_user->username;
                    $this->route('panel');
                } else {
                    $err['password'] = "رمز عبور نا معتبر";
                }
            } else {
                $err['email'] = "ایمیل وارد شده صحیح نمیباشد";
            }
        }
        $this->view('panel.auth.login',compact('err'));
    }

    public function register()
    {
        $err = [];
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['tfc_password'])) {
            if (count($_POST) == 3) {
                $users = new UsersModel();

                $find_email = $users->find_by_email($_POST['email']);
                if ($find_email) {
                    $err['email'] = "ایمیل وارد شده دارای حساب کاربری میباشد.";
                }
                if ($_POST['password'] != $_POST['tfc_password']) {
                    $err['password'] = "پسوورد های وارد شده همسان نیستند.";
                } else {
                    unset($_POST['tfc_password']);
                }

                if (empty($err)) {
                    $users->insert($_POST);
                    $this->route('panel');
                }
            }
        }
        $this->view('panel.auth.register', compact('err'));
    }

    public function index()
    {
        $users = new UsersModel();
        $users = $users->all();
        $this->view('pub.index', compact('users'));
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
        if ($user_exist == false) {
            echo "there is no users by id $id";
        } else {
            $user->delete_by_id($id);
            echo "the $id user has deleted";
        }
    }

    public function delete_by_username($username)
    {
        $user = new UsersModel();
        $user_exist = $user->find($username);
        if ($user_exist == false) {
            echo "there is no users by id $username";
        } else {
            $user->delete_by_username($username);
            echo "the $username user has deleted";
        }
    }

    public function logout()
    {
        session_destroy();
        $this->route('users/login');
    }
}
