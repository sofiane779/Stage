<?php

class AdminArticlesModel extends Driver{

    public function getCatArt($search = null){

        if(!empty($search)){

            $sql = "SELECT *
                    FROM articles a 
                    INNER JOIN cat_art c
                    ON a.id_cat_art = c.id_cat_art
                    WHERE titre LIKE :titre OR contenu LIKE :contenu OR nom_cat_art LIKE :nom_cat_art
                    ORDER BY id_art";
            $searchParams = ["titre"=>"$search%", "contenu"=>"$search%", "nom_cat_art"=>"$search%"];
            $result = $this->getRequest($sql, $searchParams);
        }else{

            $sql = "SELECT *
                    FROM articles a
                    INNER JOIN cat_art c
                    ON a.id_cat_art = c.id_cat_art
                    ORDER BY id_art";
            $result = $this->getRequest($sql);
        }

        $articles = $result->fetchAll(PDO::FETCH_OBJ);
        $datas = [];
        

        foreach($articles as $article){

            $a = new Articles();
            $a->setId_art($article->id_art);
            $a->setTitre($article->titre);
            $a->setImage($article->image);
            $a->setContenu($article->contenu);
            $a->setDate($article->date);
            $a->setAuteur($article->auteur);
            $a->getCategorie()->setId_cat_art($article->id_cat_art);
            $a->getCategorie()->setNom_cat_art($article->nom_cat_art);
            array_push($datas, $a);


        }if($result->rowCount() > 0){
            return $datas;
        }else{
            return "Aucun article répertorié ...";
        }
    }

    public function insertArticle(Articles $article){

        $sql = "INSERT INTO articles(titre, image, contenu, date, auteur, id_cat_art)
                VALUES (:titre, :image, :contenu, :date, :auteur, :id_cat_art)";
        $tabParams = ["titre"=>$article->getTitre(), "image"=>$article->getImage(), "contenu"=>$article->getContenu(), "date"=>$article->getDate(), "auteur"=>$article->getAuteur(), "id_cat_art"=>$article->getCategorie()->getId_cat_art()];

        $result = $this->getRequest($sql, $tabParams);
        return $result;
    }

    public function deleteArticle(Articles $article){

        $sql = "DELETE FROM articles WHERE id_art = :id";
        $result = $this->getRequest($sql, ['id'=>$article->getId_art()]);

        return $result->rowCount();
    }

    public function articleItem(Articles $aParam){

        $sql = "SELECT * FROM articles WHERE id_art = :id";
        $result = $this->getRequest($sql, ['id'=>$aParam->getId_art()]);

        if($result->rowCount() > 0){

            $artRow = $result->fetch(PDO::FETCH_OBJ);
            $editArt = new Articles();
            $editArt->setId_art($artRow->id_art);
            $editArt->setTitre($artRow->titre);
            $editArt->setImage($artRow->image);
            $editArt->setContenu($artRow->contenu);
            $editArt->setDate($artRow->date);
            $editArt->setAuteur($artRow->auteur);
            $editArt->getCategorie()->setId_cat_art($artRow->id_cat_art);

            return $editArt;
        }
    }

    public function updateArticle(Articles $updateA){

        if($updateA->getImage() === ""){

            $sql = "UPDATE articles
                    SET titre = :titre, contenu = :contenu, date = :date, auteur = :auteur, id_cat_art = :id_cat_art
                    WHERE id_art = :id_art";

            $tabParams = ["titre"=>$updateA->getTitre(), "contenu"=>$updateA->getContenu(), "date"=>$updateA->getDate(), "auteur"=>$updateA->getAuteur(), "id_cat_art"=>$updateA->getCategorie()->getId_cat_art(), "id_art"=>$updateA->getId_art()];

        }else{

            $sql = "UPDATE articles
                    SET titre = :titre, image = :image, contenu = :contenu, date = :date, auteur = :auteur, id_cat_art = :id_cat_art
                    WHERE id_art = :id_art";

            $tabParams = ["titre"=>$updateA->getTitre(),"image"=>$updateA->getImage(), "contenu"=>$updateA->getContenu(), "date"=>$updateA->getDate(), "auteur"=>$updateA->getAuteur(), "id_cat_art"=>$updateA->getCategorie()->getId_cat_art(), "id_art"=>$updateA->getId_art()];

        }
            $result = $this->getRequest($sql, $tabParams);
            return $result->rowCount();
    }
}