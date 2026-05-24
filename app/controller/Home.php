<?php

namespace app\controller;

use PDO;
use Exception;
use app\model\Posts as PostsModel;
class Home extends Controller
{
    public function index()
    {
        $posts = new PostsModel();
        $posts = $posts->all_posts_with_cat_and_author();

        $this->view('pub.index',compact('posts'));
    }
}
