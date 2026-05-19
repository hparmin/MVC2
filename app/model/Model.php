<?php
namespace application\model;
use PDO;
use Exception;
class Model
{
    protected $pdo;
    public function __construct()
    {
        $server = "mysql:host=localhost;dbname=first_mvc_db";
        $dbuser = "root";
        $dbpass = "";
        try {
            $this->pdo = new PDO($server, $dbuser, $dbpass);
        } catch (exception $e) {
            echo $e->getMessage();
        }
    }
}