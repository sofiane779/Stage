<?php

class ArticlesController{

    private $pubam;
    private $pubcam;
    private $pubasm;

    public function __construct(){
    
        $this->pubam = new AdminArticlesModel();
        $this->pubcam = new AdminCatArtModel();
        $this->pubasm = new ArticlesModel();
    }

    public function getPubArticles(){

        if(isset($_GET['id']) && !empty($_GET['id'])){
            if(isset($_POST['soumis']) && !empty($_POST['search'])){

                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabArt = $this->pubcam->getCatArt();
                $articles = $this->pubam->getCatArt($search);
                require_once('./views/public/Actualites.php');
            }
            $id = trim(htmlentities(addslashes($_GET['id'])));
            $a = new Articles();
            $a->getCategorie()->setId_cat_art($id);
            $tabArt = $this->pubcam->getCatArt();
            $articles = $this->pubasm->findArtByCat($a);
            require_once('./views/public/artCat.php');
            
        }else{
            if(isset($_POST['soumis']) && !empty($_POST['search'])){

                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabArt = $this->pubcam->getCatArt();
                $articles = $this->pubam->getCatArt($search);
                require_once('./views/public/Actualites.php'); 
            }
            $tabArt = $this->pubcam->getCatArt();
                $articles = $this->pubam->getCatArt();
                require_once('./views/public/Actualites.php'); 
        }
    }

}