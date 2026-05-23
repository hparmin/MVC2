<?php
namespace app\controller;

use app\model\Posts as PostsModel;
use app\model\Categories as CategoriesModel;

use PDO;
use Exception;
class Posts extends Controller
{
    public function index()
    {
        $categories = new CategoriesModel();
        $categories = $categories->all();
        $posts = new PostsModel();
        $posts = $posts->all();
        $this->view('panel.posts.index',compact('posts','categories'));
    }
    public function create()
    {
        $posts = new PostsModel();
        $categories = new CategoriesModel();
        $categories = $categories->all();

        if ($_POST) {
            $posts->insert($_POST, $_FILES);
        }
        $this->view('panel.posts.create',compact('categories'));
    }
    public function store()
    {
        $users = new PostsModel();

        $this->view('pub.index');
    }

    public function show()
    {
        echo "show";
    }
}
