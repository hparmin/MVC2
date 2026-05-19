<?php

namespace app\controller;

use system\traits\Mytrait;

class Post
{
    use Mytrait;

    public function index()
    {
        echo "index";
    }

    public function show()
    {
        echo "show";
    }
}
