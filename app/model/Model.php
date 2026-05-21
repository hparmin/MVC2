<?php
namespace app\model;
use PDO;
use Exception;
class Model
{
    protected $pdo;
    public function __construct()
    {
        $server = "mysql:host=localhost;dbname=websoft_mvc";
        $dbuser = "root";
        $dbpass = "";
        try {
            $this->pdo = new PDO($server, $dbuser, $dbpass);
        } catch (exception $e) {
            echo $e->getMessage();
        }
    }

    protected function query($sql,$filter=null){
        try {
            if ($filter==null){
                return $this->pdo->query($sql);
            }else{
                $res = $this->pdo->prepare($sql);
                $res->execute($filter);
                return $res;
            }
        }catch (Expection $e){
            $e->getMessage();
        }
    }

    protected function execute($sql,$filter=null){
        try {
            if ($filter==null){
                $this->pdo->exec($sql);
            }else{
                $res = $this->pdo->prepare($sql);
                $res->execute($filter);
            }
        }catch (Expection $e){
            $e->getMessage();
        }
    }
}