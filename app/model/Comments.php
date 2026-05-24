<?php

namespace app\model;
use app\model\Model as Model;
use PDO;
class Comments extends Model
{
    public  function all()
    {
        $query = "SELECT * FROM comments_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }


}