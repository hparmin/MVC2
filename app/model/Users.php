<?php

namespace app\model;
use app\model\Model;
use PDO;

class Users extends Model
{
    public static function findByEmail()
    {
        $user_model = new self();
        return $user_model->find_by_email($_SESSION['login']);
    }

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
    public function find_by_email($email)
    {
        $query = "SELECT * FROM users_tbl WHERE email=?";
        return $this->query($query,[$email])->fetch(PDO::FETCH_OBJ);
    }
    public function find_by_id($id)
    {
        $query = "SELECT * FROM users_tbl WHERE id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }
    public function insert($values)
    {
        $sql = "INSERT INTO users_tbl (email,password) VALUES (?,?)";
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

    public function update($values,$id)
    {
        $username = $values['username'];
        $email = $values['email'];
        $err = [];

        $sql = "SELECT id FROM users_tbl WHERE username = ?  AND id != ?";
        $res = $this->query($sql,[$username, $id])->fetch(PDO::FETCH_OBJ);
        if ($res){
            $err['username'] = true;
        }

        $sql = "SELECT id FROM users_tbl WHERE email = ?  AND id != ?";
        $res = $this->query($sql,[$email, $id])->fetch(PDO::FETCH_OBJ);
        if ($res){
            $err['email'] = true;
        }
        if (empty($err)){
            $query="UPDATE users_tbl SET email=? , username=? , persian_name=? WHERE id=?";
            $this->execute($query,array_merge(array_values($values),[$id]));
            $_SESSION['login']= $email;
        }
        return $err;
    }




}
