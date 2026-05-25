<?php

namespace app\controller;

use system\traits\Mytrait;
use app\model\Categories as CategoriesModel;

class Controller
{
    protected $sharedData = [];

    public function __construct()
    {
        // ما در تمام صفحات هدر داریم و در هدر به دسته بندی ها نیاز داریم.
        // پس در اینجا همه دسته ها را دریافت میکنیم و در متد ویو، به همه صفحات میفرستیم.
        $categoryModel = new CategoriesModel();
        $this->sharedData['categories'] = $categoryModel->all();
    }

    use Mytrait;

    protected function view($file, $var = [])
    {
        $data = array_merge($this->sharedData, $var);
        extract($data);
        // وقتی از این متد استفاده میشه، برای آدرس دهی به جای اسلش از نقطه استفاده میکنیم:
        $file = str_replace('.', '/', $file);
        $location = realpath(dirname(__FILE__) . "/../../app/view/" . $file . ".php");
        if (file_exists($location)) {
            require_once $location;
        } else {
            echo "فایل مورد نظر شما در پوشه ویو وجود ندارد.";
        }
    }

}