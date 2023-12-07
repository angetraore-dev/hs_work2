<?php

namespace Classes;

class Recus
{
    protected $ID;
    protected $users;
    protected $dateRecu;
    protected $details;
    protected $montant;
    protected $recouvreur;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getDateRecu()
    {
        return $this->dateRecu;
    }

    /**
     * @param mixed $dateRecu
     */
    public function setDateRecu($dateRecu): void
    {
        $this->dateRecu = $dateRecu;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details): void
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant): void
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getRecouvreur()
    {
        return $this->recouvreur;
    }

    /**
     * @param mixed $recouvreur
     */
    public function setRecouvreur($recouvreur): void
    {
        $this->recouvreur = $recouvreur;
    }


    public static function getRecusByDateDay()
    {

        $stmt = "SELECT SUM(montant) AS encaissement FROM recus where DAY(dateRecu) = DAY(CURDATE())";
        return DbConfig::getDb()->prepare($stmt, null, get_called_class());
    }

    public static function allRecus()
    {
        $stmt = "SELECT COUNT(*) AS allrecus FROM recus";
        return DbConfig::getDb()->query($stmt, get_called_class());
    }

}