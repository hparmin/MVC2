<?php

namespace app\model;

use app\model\Model as Model;
use PDO;

class Posts extends Model
{
    public function all()
    {
        $query = "SELECT * FROM posts_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($post_id)
    {
        $query = "SELECT * FROM posts_tbl WHERE id=?";
        return $this->query($query, [$post_id])->fetch(PDO::FETCH_OBJ);
    }

    public function find_by_author($user_id)
    {
        $query = "SELECT * FROM posts_tbl WHERE author=?";
        return $this->query($query, [$user_id])->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($values, $file = null)
    {
        if ($file) {
            $the_pic = $file['picture'];
            if ($the_pic['name']) {
                $temp = $the_pic["tmp_name"];
                $name = $the_pic["name"];
                $nt = explode('.', $name);
                $extention = end($nt);
                $newint = rand();
                $new_name = time() . $newint . "." . $extention;

                global $project_full_directory;

                $database_address = "public/images/uploads/posts/" . $new_name;

                $img_location = $project_full_directory . "public/images/uploads/posts/" . $new_name;

                move_uploaded_file($temp, $img_location);

                $add['img'] = $database_address;
            } else {
                $add['img'] = '';
            }
        } else {
            $add['img'] = '';
        }

        $user = Users::findByEmail();
        $the_user['id'] = $user->id;

        $database_values = array_merge($values, $add, $the_user);

        $sql = "INSERT INTO posts_tbl (title,categories,body,img,author) VALUES (?,?,?,?,?)";
        $this->execute($sql, array_values($database_values));
    }

    public function delete_by_id($id)
    {
        $the_post = $this->find($id);

        if ($the_post) {
            global $project_full_directory;

            $post_img_path = $project_full_directory . $the_post->img;
            $sql = "DELETE FROM posts_tbl WHERE id=?";
            $this->execute($sql, [$id]);
            unlink($post_img_path);
        }
    }

    public function update($values, $post_id, $file = null)
    {
        if ($file) {
            $the_pic = $file['picture'];
            if ($the_pic['name']) {
                // if picture has uploaded:
                global $project_full_directory;

                //remove old picture:
                $the_post = $this->find($post_id);
                if ($the_post) {
                    $post_img_path = $project_full_directory . $the_post->img;
                    unlink($post_img_path);
                }

                // replacing the new picture:
                $temp = $the_pic["tmp_name"];
                $name = $the_pic["name"];
                $nt = explode('.', $name);
                $extention = end($nt);
                $newint = rand();
                $new_name = time() . $newint . "." . $extention;

                $database_address = "public/images/uploads/posts/" . $new_name;

                $img_location = $project_full_directory . "public/images/uploads/posts/" . $new_name;

                move_uploaded_file($temp, $img_location);

                $add['img'] = $database_address;

                $database_values = array_merge($values, $add);

                $query = "UPDATE posts_tbl SET title=? , categories=? , body=? , img=? WHERE id=?";
                $this->execute($query, array_merge(array_values($database_values), [$post_id]));
            }else{
                // if pictute has not uploaded, just update the valuse:
                $query = "UPDATE posts_tbl SET title=? , categories=? , body=? WHERE id=?";
                $this->execute($query, array_merge(array_values($values), [$post_id]));
            }
        }


    }


    // بعدا دستور پایین تست شود:
    public function find_by_text($text)
    {
        $query = "SELECT * FROM posts_tbl WHERE body LIKE %?%";
        return $this->query($query, [$text])->fetchAll(PDO::FETCH_OBJ);
    }
}
