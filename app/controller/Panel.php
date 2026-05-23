<?php

namespace app\controller;
use app\controller\Controller;
class Panel extends Controller
{
    public function __constructc()
    {
    }

    public function index()
    {
        $this->view('panel.index');
    }
}