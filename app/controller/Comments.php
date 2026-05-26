<?php

namespace app\controller;

use app\model\Comments as CommentsModel;
use app\controller\Users as UsersModel;

use PDO;
use Exception;

class Comments extends Controller
{
    public function index()
    {
        $comments = new CommentsModel();
        $comments = $comments->comments_posts_authors();
        $this->view('panel.comments.index', compact('comments'));
    }

    public function remove($id)
    {
        $comments = new CommentsModel();
        $comments->delete($id);

        $this->reback();
    }

    public function insert()
    {
        if (isset($_POST['comment_text'])) {
            $users = new UsersModel();
            $user = $users->find_user_by_email($_SESSION['login']);
            $user_id = $user->id;
            var_dump($_POST);

            $comments = new CommentsModel();
//            $comments->store();
        }
    }
}
