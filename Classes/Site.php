<?php

namespace Classes;

class Site extends Database
{
    protected $idSite;
    protected $code;
    protected $adresse;
    protected $zone;
    protected $gerant;
    protected $telephone;
    protected $idClient;

    /**
     * @return mixed
     */
    public function getIdSite()
    {
        return $this->idSite;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param mixed $zone
     */
    public function setZone($zone): void
    {
        $this->zone = $zone;
    }

    /**
     * @return mixed
     */
    public function getGerant()
    {
        return $this->gerant;
    }

    /**
     * @param mixed $gerant
     */
    public function setGerant($gerant): void
    {
        $this->gerant = $gerant;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
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

    public static function siteByIdClient($id)
    {
        $stmt = "SELECT site.idSite, site.code, site.adresse, site.zone, site.telephone, site.gerant, site.idClient, c.nom, c.prenom FROM site JOIN clients c on site.idClient = c.id WHERE idClient = ?";
        return DbConfig::getDb()->prepare($stmt, [$id], get_called_class());
    }


    public function create($fields): bool
    {
        $implodeCols = implode(', ', array_keys($fields));
        $implodePlaceholder = implode(", :", array_keys($fields));

        $sql = "INSERT INTO site ($implodeCols) VALUES(:" . $implodePlaceholder . ")";

        $stmt = $this->getPDO()->prepare($sql);

        foreach ($fields as $key => $value) {

            $stmt->bindValue(':' . $key, $value);
        }

        if ($stmt->execute()) {

            $insert = true;

        } else {

            $insert = false;
        }

        return $insert;
    }


}