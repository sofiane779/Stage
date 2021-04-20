<?php

class Cat_art{

    private $id_cat_art;
    private $nom_cat_art;



    /**
     * Get the value of id_cat_art
     */ 
    public function getId_cat_art()
    {
        return $this->id_cat_art;
    }

    /**
     * Set the value of id_cat_art
     *
     * @return  self
     */ 
    public function setId_cat_art($id_cat_art)
    {
        $this->id_cat_art = $id_cat_art;

        return $this;
    }

    /**
     * Get the value of nom_cat_art
     */ 
    public function getNom_cat_art()
    {
        return $this->nom_cat_art;
    }

    /**
     * Set the value of nom_cat_art
     *
     * @return  self
     */ 
    public function setNom_cat_art($nom_cat_art)
    {
        $this->nom_cat_art = $nom_cat_art;

        return $this;
    }
}