<?php
namespace Classes;

use PDO;
use PDOException;

class Database
{

    protected $connexion;


    protected function getPDO()
    {
        $dsn = 'mysql:host=localhost;dbname=blackhaw_app';

        try {
            $connexion = new PDO($dsn, 'root', 'root@48_');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion = $connexion;

        }catch (PDOException $exception){
            echo "Erreur:" .$exception;
            die();
        }
        return $connexion;
    }

    /**
     * @return mixed
     */
    public function LastInsertId()
    {
        return $this->connexion->lastInsertId();
    }

    public function query($stmt, $class_name, $one = false)
    {
        $request = $this->getPDO()->query($stmt);
        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one){
            $datas = $request->fetch();

        }else{//without fetch_assoc PDO::FETCH_ASSOC
            $datas = $request->fetchAll();
        }
        return $datas;
    }

    public function prepare($stmt, $attributes, $class_name, $one = false )
    {
        $request = $this->getPDO()->prepare($stmt);
        $request->execute($attributes);
        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one){
            $datas = $request->fetch();

        }else{
            $datas = $request->fetchAll();
        }
        return $datas;

    }


}