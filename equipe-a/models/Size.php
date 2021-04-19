<?php

class Size{

    private $id_size;
    private $nom_size;




    /**
     * Get the value of id_size
     */ 
    public function getId_size()
    {
        return $this->id_size;
    }

    /**
     * Set the value of id_size
     *
     * @return  self
     */ 
    public function setId_size($id_size)
    {
        $this->id_size = $id_size;

        return $this;
    }

    /**
     * Get the value of nom_size
     */ 
    public function getNom_size()
    {
        return $this->nom_size;
    }

    /**
     * Set the value of nom_size
     *
     * @return  self
     */ 
    public function setNom_size($nom_size)
    {
        $this->nom_size = $nom_size;

        return $this;
    }
}