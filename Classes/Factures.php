<?php

namespace Classes;

class Factures extends Database
{
    protected $id;
    protected $idClient;
    protected $numeroFacture;
    protected $dateFacture;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient): void
    {
        $this->idClient = $idClient;
    }

    /**
     * @return mixed
     */
    public function getNumeroFacture()
    {
        return $this->numeroFacture;
    }

    /**
     * @param mixed $numeroFacture
     */
    public function setNumeroFacture($numeroFacture): void
    {
        $this->numeroFacture = $numeroFacture;
    }

    /**
     * @return mixed
     */
    public function getDateFacture()
    {
        return $this->dateFacture;
    }

    /**
     * @param mixed $dateFacture
     */
    public function setDateFacture($dateFacture): void
    {
        $this->dateFacture = $dateFacture;
    }

    public static function allFactures()
    {
        $stmt = "SELECT COUNT(*) AS allfactures FROM factures";
        return DbConfig::getDb()->query($stmt, get_called_class());
    }

    public static function listFactures()
    {
        $stmt = "SELECT factures.id, idClient, numeroFacture, dateFacture, c.nom,c.prenom  FROM factures JOIN clients c on c.id = factures.idClient ORDER BY dateFacture DESC ";
    }

    public function createFacture($fields)
    {
        $implodeColumns = implode(', ', array_keys($fields));
        $implodePlaceholders = implode(', :', array_keys($fields));
        $request = "INSERT INTO factures($implodeColumns) VALUES (:". $implodePlaceholders .")";

        $stmt = $this->getPDO()->prepare($request);

        foreach ( $fields as $key => $value ){
            $stmt->bindValue(':'.$key, $value);
        }

        $stmtExec = $stmt->execute();

        return $stmtExec;

    }

    public static function getIdClientByEnterIdFacture($idfacture)
    {
        $stmt = "SELECT idClient FROM factures WHERE id=?";
        return DbConfig::getDb()->prepare($stmt,[$idfacture], get_called_class(), true);
    }

}