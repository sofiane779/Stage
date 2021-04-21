<?php

class AdminCatArtModel extends Driver{

    public function getCatArt(){

        $sql = "SELECT * FROM cat_art";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabCatArt = [];

        foreach($rows as $row){
            $catart = new CatArt();
            $catart->setId_cat_art($row->id_cat_art);
            $catart->setNom_cat_art($row->nom_cat_art);
            array_push($tabCatArt, $catart);
        }
        return $tabCatArt;
    }

    public function deleteCatArt($id){

        $sql = "DELETE FROM cat_art WHERE id_cat_art = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        $nb = $result->rowCount();
        return $nb;       
    }

    public function catArtItem($id){

        $sql = "SELECT * FROM cat_art WHERE id_cat_art = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        if($result->rowCount() > 0){

            $row = $result->fetch(PDO::FETCH_OBJ);

            $catart = new CatArt();
            $catart->setId_cat_art($row->id_cat_art);
            $catart->setNom_cat_art($row->nom_cat_art);
            
            return $catart;
        }
    }

    public function updateCatArt(CatArt $catart){

        $sql = "UPDATE cat_art
                SET nom_cat_art = :nom
                WHERE id_cat_art = :id";
        $result = $this->getRequest($sql, ['nom'=>$catart->getNom_cat_art(), 'id'=>$catart->getId_cat_art()]);

        if($result->rowCount() > 0){

            $nb = $result->rowCount();
            return $nb;
        }
    }

    public function insertCatArt(CatArt $catart){

        $sql = "INSERT INTO cat_art(nom_cat_art)
                VALUES (:nom)";
        $result = $this->getRequest($sql, array('nom'=>$catart->getNom_cat_art()));

        return $result;
    }
}