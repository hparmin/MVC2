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

    public function posts_of_category($id)
    {
        $sql = "SELECT
            posts_tbl.id,
            posts_tbl.title,
            posts_tbl.body,
            posts_tbl.img,

            users_tbl.username,
            users_tbl.persian_name,

            categories_tbl.title AS category_title

        FROM posts_tbl

        INNER JOIN users_tbl
        ON posts_tbl.author = users_tbl.id

        INNER JOIN categories_tbl
        ON posts_tbl.categories = categories_tbl.id
        
        WHERE categories_tbl.id=?";

        return $this->query($sql,[$id])->fetchAll(PDO::FETCH_OBJ);
    }
}
