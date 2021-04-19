<?php

class AdminShopModel extends Driver{

    public function getShop($search = null){

        if(!empty($search)){

            $sql = "SELECT *
            FROM vetements v 
            INNER JOIN categories c
            ON v.id_cat = c.id_cat
            INNER JOIN size s
            ON v.id_size = s.id_size
            WHERE modele LIKE :modele OR nom_cat LIKE :nom_cat OR nom_size LIKE :nom_size
            ORDER BY id_vet";
            $searchParams = ["modele"=>"$search%", "nom_cat"=>"$search%", "nom_size"=>"$search%"];
            $result = $this->getRequest($sql, $searchParams);

        }else{
            $sql = "SELECT *
                    FROM vetements v
                    INNER JOIN categories c 
                    ON v.id_cat = c.id_cat
                    INNER JOIN size s
                    ON v.id_size = s.id_size
                    ORDER BY id_vet";
            $result = $this->getRequest($sql);
        }

        $wears = $result->fetchAll(PDO::FETCH_OBJ);

        $datas = [];

        foreach($wears as $wear){

            $v = new Vetements();
            $v->setId_vet($wear->id_vet);
            $v->setModele($wear->modele);
            $v->setImage($wear->image);
            $v->setPrix($wear->prix);
            $v->setCouleur($wear->couleur);
            $v->setQuantite($wear->quantite);
            $v->setDescriptions($wear->descriptions);
            $v->getCategories()->setId_cat($wear->id_cat);
            $v->getCategories()->setNom_cat($wear->nom_cat);
            $v->getSize()->setId_size($wear->id_size);
            $v->getSize()->setNom_size($wear->nom_size);
            array_push($datas, $v);
            
        }if($result->rowCount() > 0){
            return $datas;
        }else{
            return "Pas de vêtement insérer ...";
        }
    }

    public function insertVetement(Vetements $wear){

        $sql = "INSERT INTO vetements(modele, image, prix, couleur, quantite, descriptions, id_cat, id_size)
                VALUES(:modele, :image, :prix, :couleur, :quantite, :descr, :id_cat, :id_size)";

        $tabParams = ["modele"=>$wear->getModele(), "image"=>$wear->getImage(), "prix"=>$wear->getPrix(), "couleur"=>$wear->getCouleur(), "quantite"=>$wear->getQuantite(), "descr"=>$wear->getDescriptions(), "id_cat"=>$wear->getCategories()->getId_cat(), "id_size"=>$wear->getSize()->getId_size(), ];
    
        $result = $this->getRequest($sql, $tabParams);

        return $result;
    }

    public function deleteVetement(Vetements $wear){

        $sql = "DELETE FROM vetements WHERE id_vet = :id";
        $result = $this->getRequest($sql, ['id'=>$wear->getId_vet()]);

        return $result->rowCount();
    }

    public function vetementItem(Vetements $vParam){

        $sql = "SELECT * FROM vetements WHERE id_vet = :id";
        $result = $this->getRequest($sql, ['id'=>$vParam->getId_vet()]);

        if($result->rowCount() > 0){

            $vetRow = $result->fetch(PDO::FETCH_OBJ);
            $editvet = new Vetements();
            $editvet->setId_vet($vetRow->id_vet);
            $editvet->setModele($vetRow->modele);
            $editvet->setImage($vetRow->image);
            $editvet->setPrix($vetRow->prix);
            $editvet->setCouleur($vetRow->couleur);
            $editvet->setQuantite($vetRow->quantite);
            $editvet->setDescriptions($vetRow->descriptions);
            $editvet->getCategories()->setId_cat($vetRow->id_cat);
            $editvet->getSize()->setId_size($vetRow->id_size);

            return $editvet;

        }
    }

    public function updateVetement(Vetements $updateV){

        if($updateV->getImage() === ""){

            $sql = "UPDATE vetements
                    SET modele = :modele, prix = :prix, couleur = :couleur, quantite = :quantite, descriptions = :descriptions, id_cat = :id_cat, id_size = :id_size
                    WHERE id_vet = :id_vet";

            $tabParams = ["modele"=>$updateV->getModele(), "prix"=>$updateV->getPrix(), "couleur"=>$updateV->getCouleur(), "quantite"=>$updateV->getQuantite(), "descriptions"=>$updateV->getDescriptions(), "id_cat"=>$updateV->getCategories()->getId_cat(), "id_size"=>$updateV->getSize()->getId_size(), "id_vet"=>$updateV->getId_vet()];

        }else{

            $sql = "UPDATE vetements
                    SET modele = :modele, image = :image, prix = :prix, couleur = :couleur, quantite = :quantite, descriptions = :descriptions, id_cat = :id_cat, id_size = :id_size
                    WHERE id_vet = :id_vet";

            $tabParams = ["modele"=>$updateV->getModele(),"image"=>$updateV->getImage(),  "prix"=>$updateV->getPrix(), "couleur"=>$updateV->getCouleur(), "quantite"=>$updateV->getQuantite(), "descriptions"=>$updateV->getDescriptions(), "id_cat"=>$updateV->getCategories()->getId_cat(), "id_size"=>$updateV->getSize()->getId_size(), "id_vet"=>$updateV->getId_vet()];
        }

        $result = $this->getRequest($sql, $tabParams);

        return $result->rowCount();
    }
}