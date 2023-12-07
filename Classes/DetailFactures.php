<?php

namespace Classes;

class DetailFactures extends Database
{
    protected $id;
    protected $idFacture;
    protected $prixUnitaire;
    protected $prix;
    protected $quantite;
    protected $remise;
    protected $idService;
    protected $idSite;
    protected $dateDeMiseEnPlace;

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
    public function getIdFacture()
    {
        return $this->idFacture;
    }

    /**
     * @param mixed $idFacture
     */
    public function setIdFacture($idFacture): void
    {
        $this->idFacture = $idFacture;
    }

    /**
     * @return mixed
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * @param mixed $prixUnitaire
     */
    public function setPrixUnitaire($prixUnitaire): void
    {
        $this->prixUnitaire = $prixUnitaire;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite): void
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * @param mixed $remise
     */
    public function setRemise($remise): void
    {
        $this->remise = $remise;
    }

    /**
     * @return mixed
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * @param mixed $idService
     */
    public function setIdService($idService): void
    {
        $this->idService = $idService;
    }

    /**
     * @return mixed
     */
    public function getIdSite()
    {
        return $this->idSite;
    }

    /**
     * @param mixed $idSite
     */
    public function setIdSite($idSite): void
    {
        $this->idSite = $idSite;
    }

    /**
     * @return mixed
     */
    public function getDateDeMiseEnPlace()
    {
        return $this->dateDeMiseEnPlace;
    }

    /**
     * @param mixed $dateDeMiseEnPlace
     */
    public function setDateDeMiseEnPlace($dateDeMiseEnPlace): void
    {
        $this->dateDeMiseEnPlace = $dateDeMiseEnPlace;
    }


    public function insertLigneFacture($fields)
    {
        $implodeCols = implode(', ',array_keys($fields));
        $implodePlaceholder = implode(", :",array_keys($fields));

        $sql = "INSERT INTO detailFactures($implodeCols) VALUES(:" .$implodePlaceholder. ")";

        $stmt = $this->getPDO()->prepare($sql);

        foreach ($fields as $key => $value){

            $stmt->bindValue(':' .$key, $value);
        }

        if ( $stmt->execute() ){

            $insert = true;

        }else{

            $insert = false;
        }

        return $insert;
    }

    public static function returnAllDetailLineByIdFacture($idfacture)
    {
        $stmt = "SELECT id, idFacture, prixUnitaire, prix, quantite, remise, dateDeMiseEnPlace, s.designation, s2.idSite, s2.code FROM detailFactures 
    JOIN service s on s.idService = detailFactures.idService 
    JOIN site s2 on s2.idSite = detailFactures.idSite WHERE detailFactures.idFacture =?";

        return DbConfig::getDb()->prepare($stmt, [$idfacture], get_called_class(), false);
    }

    public static function returnAllDetailLineByIdFactureGroupBySite($idfacture)
    {
        $stmt = "SELECT id, idFacture, prixUnitaire, prix, quantite, remise, dateDeMiseEnPlace, s.designation, s2.idSite, s2.code FROM detailFactures 
    JOIN service s on s.idService = detailFactures.idService 
    JOIN site s2 on s2.idSite = detailFactures.idSite WHERE detailFactures.idFacture =? GROUP BY s2.idSite, s2.code";

        return DbConfig::getDb()->prepare($stmt, [$idfacture], get_called_class(), false);
    }


}