<?php

namespace app\model;
use app\model\Model as Model;
use PDO;

class Categories extends Model
{
    public  function all()
    {
        $query = "SELECT * FROM categories_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }
    public function find($category_id)
    {
        $query = "SELECT * FROM categories_tbl WHERE id=?";
        return $this->query($query,[$category_id])->fetch(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $sql = "INSERT INTO categories_tbl (title) VALUES (?)";
        $this->execute($sql,array_values($values));
    }
    public function update($values,$id)
    {
        $query="UPDATE categories_tbl SET title=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }
    public function delete_by_id($id)
    {
        $sql = "DELETE FROM categories_tbl WHERE id=?";
        $this->execute($sql,[$id]);
    }
}
