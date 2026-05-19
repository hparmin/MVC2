<?php

namespace system\bootstrap;
class autoload
{
    public function myautoload()
    {
        spl_autoload_register(function ($class){
            $class = str_replace("\\","/",$class);
            require_once ($_SERVER["DOCUMENT_ROOT"]."/websoft-mvc/"."$class".".php");
        });
    }
}