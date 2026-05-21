<?php
namespace app\controller;

use app\model\Users;
use app\model\Users as UserModel;

use PDO;
use Exception;
class Post extends Controller
{
    public function index()
    {
        $users = new UserModel();
        $users = $users->all()->fetchAll(PDO::FETCH_OBJ);
        $this->view('pub.index',compact('users'));
    }
    public function insert()
    {
        $users = new UserModel();
        $values = ['airom','123456','airom@gmail.com','admin'];
        $users->insert($values);
        $this->view('pub.index',compact('users'));
    }

    public function show()
    {
        echo "show";
    }
}
