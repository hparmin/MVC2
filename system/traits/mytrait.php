<?php
namespace system\traits;

trait Mytrait
{
    protected function route($location)
    {
        $protocol = strpos($_SERVER['SERVER_PROTOCOL'], 'https') == true ? 'https' : 'http';
        header('location:' . $protocol . "://" . $_SERVER['HTTP_HOST'] . '/websoft-mvc/' . $location);
    }

    protected function reback()
    {
        $reback = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        if ($reback != null) {
            header("location:$reback");
        } else {
            echo "صفحه قبلی وجود ندارد";
        }
    }

    protected function asset($file)
    {
        global $site_url;
        $path = $site_url . "public/" . $file;
        echo $path;
    }

    protected function url($url=null)
    {
        global $site_url;
        if (!$url) {
            echo $site_url;
        } else {
            $path = $site_url . $url;
            echo $path;
        }
    }


    protected function layout_include($file, $var = null)
    {
        if ($var) {
            extract($var);
        }
        // وقتی از این متد استفاده میشه، برای آدرس دهی به جای اسلش از نقطه استفاده میکنیم:
        $file = str_replace('.', '/', $file);
        $location = realpath(dirname(__FILE__) . "/../../app/view/" . $file . ".php");
        if (file_exists($location)) {
            require_once $location;
        } else {
            echo "فایل مورد نظر شما در پوشه ویو وجود ندارد.";
        }
    }

    public function find_user_nickname($object)
    {
        if (!empty($object->persian_name)){
            return $object->persian_name;
        }elseif (!empty($object->username)){
            return $object->username;
        }else{
            return $object->email;
        }
    }
}
