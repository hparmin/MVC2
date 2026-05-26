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

    public function comments_posts_authors()
    {
        $sql = "SELECT
            comments_tbl.id,
            comments_tbl.body,
            comments_tbl.status,
            comments_tbl.post_id,
    
            posts_tbl.title,

            users_tbl.username,
            users_tbl.persian_name,
            users_tbl.email

        FROM comments_tbl

        INNER JOIN posts_tbl
        ON comments_tbl.post_id = posts_tbl.id

        INNER JOIN users_tbl
        ON comments_tbl.author = users_tbl.id
        ";
        return $this->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM comments_tbl WHERE id=?";
        $this->query($sql,$id);
    }
    public function store($values,$user_id)
    {
        $sql = "INSERT INTO comments_tbl (body,author,post_id) VALUES (?,?,?)";
    }


}