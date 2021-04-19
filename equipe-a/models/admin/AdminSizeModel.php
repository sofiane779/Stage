<?php

class AdminSizeModel extends Driver{

    public function getSize(){

        $sql = "SELECT * FROM size";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabSize = [];

        foreach($rows as $row){

            $size = new Size();
            $size->setId_size($row->id_size);
            $size->setNom_size($row->nom_size);
            array_push($tabSize, $size);
        }
        return $tabSize;
    }

    // public function sizeItem($id){

    //     $sql = "SELECT * FROM size WHERE id_size = :id";
    //     $result = $this->getRequest($sql, ['id'=>$id]);
    //     if($result->rowCount() >0){

    //         $row = $result->fetch(PDO::FETCH_OBJ);

    //         $size = new Size();
    //         $size->setId_size($row->id_size);
    //         $size->setNom_size($row->nom_size);

    //         return $size;
    //     } 

    // }

    // public function updateSize(Size $size){
    //     $sql = "UPDATE size 
    //             SET nom_size = :nom
    //             WHERE id_size = :id";
    //     $result = $this->getRequest($sql,['nom'=>$size->getNom_size(),'id'=>$size->getId_size()]);

    //     if($result->rowCount() > 0){
    //         $nb = $result->rowCount();
    //         return $nb;
    //     }
    // }

    // public function insertSize(Size $size){

    //     $sql = "INSERT INTO size(nom_size)
    //             VALUES(:nom)";
    //     $result = $this->getRequest($sql, array('nom'=>$size->getNom_size()));

    //     return $result;
    // }
}