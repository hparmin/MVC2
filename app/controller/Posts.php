<?php
namespace app\controller;

use app\model\Posts as PostsModel;
use app\model\Categories as CategoriesModel;
use app\model\Users as UsersModel;

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
        $users = new UsersModel();
        $users = $users->all();

        $this->view('panel.posts.index',compact('posts','categories','users'));
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

    public function delete($id)
    {
        $posts = new PostsModel();
        $posts->delete_by_id($id);
        $this->route('posts');
    }

    public function edit($id)
    {
        $posts = new PostsModel();
        $post = $posts->find($id);

        if ($post){
            $category_id = $post->categories;
            $categories = new CategoriesModel();
            $all_categories = $categories->all();
            $post_category = $categories->find($category_id);
            $this->view('panel.posts.edit',compact('post','post_category','all_categories'));
        }else{
            $this->view('panel.posts.edit',compact('post'));
        }
        if ($_POST) {
            $posts->update($_POST,$post->id, $_FILES);
            $this->route("posts/edit/$post->id");
        }
    }

    public function update()
    {

    }
}
