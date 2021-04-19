<?php
class AdminCategoriesModel extends Driver{

    public function getCategories(){

        $sql = "SELECT * FROM categories";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabCat = [];

        foreach($rows as $row){

            $cat = new Categories();
            $cat->setId_cat($row->id_cat);
            $cat->setNom_cat($row->nom_cat);
            array_push($tabCat, $cat);
        }
        return $tabCat;

    }

    public function deleteCat($id){
        $sql  = "DELETE FROM categories WHERE id_cat = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        $nb = $result->rowCount();
        return $nb;
    }

    public function categoriesItem($id){

        $sql = "SELECT * FROM categories WHERE id_cat = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        if($result->rowCount() >0){

            $row = $result->fetch(PDO::FETCH_OBJ);

            $cat = new Categories();
            $cat->setId_cat($row->id_cat);
            $cat->setNom_cat($row->nom_cat);

            return $cat;
        } 

    }

    public function updateCategories(Categories $cat){
        $sql = "UPDATE categories 
                SET nom_cat = :nom
                WHERE id_cat = :id";
        $result = $this->getRequest($sql,['nom'=>$cat->getNom_cat(),'id'=>$cat->getId_cat()]);

        if($result->rowCount() > 0){
            $nb = $result->rowCount();
            return $nb;
        }
    }

    
    public function insertCategories(Categories $cat){

        $sql = "INSERT INTO categories(nom_cat)
                VALUES(:nom)";
        $result = $this->getRequest($sql, array('nom'=>$cat->getNom_cat()));

        return $result;
    }


}