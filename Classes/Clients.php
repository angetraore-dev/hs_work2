<?php

namespace Classes;

class Clients
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenoms = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


    public static function RegisteredCustomersInDay()
    {
        $stmt = "SELECT COUNT(*) AS allcustomers FROM clients";
        return DbConfig::getDb()->query($stmt, get_called_class(), false);
    }

    public static function userByKeyUp($id)
    {
        $stmt = "SELECT * FROM clients WHERE clients.nom  LIKE '%".$id."%' ";
        return DbConfig::getDb()->query($stmt, get_called_class(), false);

    }

}