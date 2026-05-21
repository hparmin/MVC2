<?php

namespace app\model;
use app\model\Model;
use PDO;

class Users extends Model
{
    public  function all()
    {
        $query = "SELECT * FROM users_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }
    public function find($username)
    {
        $query = "SELECT * FROM users_tbl WHERE username=?";
        return $this->query($query,[$username])->fetch(PDO::FETCH_OBJ);
    }
    public function find_by_id($id)
    {
        $query = "SELECT * FROM users_tbl WHERE id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }
    public function insert($values)
    {
        $sql = "INSERT INTO users_tbl (username,password,email,role) VALUES (?,?,?,?)";
        $this->execute($sql,array_values($values));
    }

    public function delete_by_id($id)
    {
        $sql = "DELETE FROM users_tbl WHERE id=?";
        $this->execute($sql,[$id]);
    }
    public function delete_by_username($username)
    {
        $sql = "DELETE FROM users_tbl WHERE username=?";
        $this->execute($sql,[$username]);
    }
}
