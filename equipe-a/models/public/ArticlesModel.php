<?php

class ArticlesModel extends Driver{

    public function findArtByCat(Articles $article){

        $sql = "SELECT * FROM articles a
                INNER JOIN cat_art c
                ON a.id_cat_art = c.id_cat_art
                WHERE a.id_cat_art = :id";
        $result = $this->getRequest($sql, ['id'=>$article->getCategorie()->getId_cat_art()]);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $article = [];

        foreach($rows as $row){

            $newArt = new Articles();
            $newArt->setId_art($row->id_art);
            $newArt->setTitre($row->titre);
            $newArt->setImage($row->image);
            $newArt->setContenu($row->contenu);
            $newArt->setDate($row->date);
            $newArt->setAuteur($row->auteur);
            $newArt->getCategorie()->setId_cat_art($row->id_cat_art);
            array_push($article, $newArt);

        }
        return $article;
    }




}