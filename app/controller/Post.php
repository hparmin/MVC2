<?php

namespace app\controller;

use system\traits\Mytrait;

class Post
{
    use Mytrait;

    public function index()
    {
        $this->view('panel.index');
    }

    public function show()
    {
        echo "show";
    }
}
