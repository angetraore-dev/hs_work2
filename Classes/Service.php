<?php

namespace Classes;

class Service
{
    protected $idService;
    protected $designation;

    /**
     * @return mixed
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    public static function allService()
    {
        $stmt = "SELECT * FROM service ORDER BY designation";
        return DbConfig::getDb()->query($stmt, get_called_class(), false);
    }


}