<?php

class ShopModel extends Driver{

    public function findShopByCat(Vetements $wear){

        $sql = "SELECT * FROM vetements v
                INNER JOIN categories c
                ON v.id_cat = c.id_cat
                INNER JOIN size s
                ON v.id_size = s.id_size
                WHERE modele LIKE :modele OR nom_cat LIKE :nom_cat OR nom_size LIKE :nom_size";
                $result = $this->getRequest($sql, ['id'=>$wear->getId_vet()]);

                $rows = $result->fetchAll(PDO::FETCH_OBJ);
                $wear = [];
                foreach($rows as $row){

                    $newVet = new Vetements();
                    $newVet->setId_vet($row->id_vet);
                    $newVet->setModele($row->modele);
                    $newVet->setImage($row->image);
                    $newVet->setPrix($row->prix);
                    $newVet->setCouleur($row->couleur);
                    $newVet->setQuantite($row->quantite);
                    $newVet->setDescriptions($row->descriptions);
                    $newVet->getCategories()->setId_cat($row->id_cat);
                    $newVet->getCategories()->setNom_cat($row->nom_cat);
                    $newVet->getSize()->setId_size($row->id_size);
                    $newVet->getSize()->setNom_size($row->nom_size);
                    array_push($wear, $newVet);
                }
                return $wear;
    }

    public function updateStock(Vetements $v){

        $sql = "UPDATE vetements SET quantite = :quantite WHERE id_vet = :id";
        $result = $this->getRequest($sql, ['quantite'=>$v->getQuantite(), 'id'=>$v->getId_vet()]);

        return $result->rowCount();
    }




} 