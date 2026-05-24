<?php
namespace app\controller;

use app\model\Comments as CommentsModel;

use PDO;
use Exception;
class Comments extends Controller
{
    public function index()
    {
        $comments = new CommentsModel();
        $comments = $comments->all();
        $this->view('panel.comments.index',compact('comments'));
    }
}
