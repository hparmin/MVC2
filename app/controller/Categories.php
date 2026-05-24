<?php

namespace app\controller;

use app\model\Categories as CategoriesModel;

class Categories extends Controller
{
    public function index()
    {
        $categories = new CategoriesModel();
        $categories = $categories->all();
        $this->view('panel.categories.index', compact('categories'));
    }

    public function create()
    {
        if (isset($_POST['category'])) {
            $categories = new CategoriesModel();
            $categories->insert($_POST);
            $this->route('categories');
            die();
        }
        $this->view('panel.categories.create');
    }

    public function edit($id)
    {
        $categories = new CategoriesModel();
        if (isset($_POST['category'])){
            $categories->update($_POST,$id);
            $this->route("categories/edit/$id?update=done");
        }
        $category = $categories->find($id);
        $this->view('panel.categories.edit',compact('category'));
    }

    public function archive($id)
    {
       $categories = new CategoriesModel();
       $posts = $categories->posts_of_category($id);
       $this->view('pub.category_archive',compact('posts'));
    }
    public function delete($id)
    {
        $categories = new CategoriesModel();
        $categories->delete_by_id($id);
        $this->route('categories');
    }
}