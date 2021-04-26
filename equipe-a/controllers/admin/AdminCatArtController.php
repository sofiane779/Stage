<?php

class AdminCatArtController{

    private $adCatArt;

    public function __construct(){
    
        $this->adCatArt = new AdminCatArtModel();
    }

    public function listCatArt(){
        AuthController::isLogged();
        $allCatArt = $this->adCatArt->getCatArt();
        require_once('./views/admin/AdminCatArtItems.php');
        return $allCatArt;
    }

    public function removeCatArt(){
        AuthController::isLogged();
        AuthController::accessUser();
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){

            $id = trim($_GET['id']);

            $nbLine = $this->adCatArt->deleteCatArt($id);

            if($nbLine > 0){
                header('location:index.php?action=list_cat_art');
            }
        }
    }

    public function editCatArt(){
        AuthController::isLogged();
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){

            $id = trim($_GET['id']);
            $catart = $this->adCatArt->catArtItem($id);

            if(isset($_POST['soumis']) && !empty($_POST['cat'])){

                $cat = trim(addslashes(htmlentities($_POST['cat'])));
                $catart->setNom_cat_art($cat);
                $nb = $this->adCatArt->updateCatArt($catart);

                if($nb > 0){
                    header('location:index.php?action=list_cat_art');
                }
            }
            require_once('./views/admin/AdminEditCatArt.php');
        }
    }

    public function addCatArt(){
        AuthController::isLogged();
        if(isset($_POST['soumis']) && !empty($_POST['categorie'])){

            $nom_cat_art = trim(htmlentities(addslashes($_POST['categorie'])));
            $newCatArt = new CatArt();
            $newCatArt->setNom_cat_art($nom_cat_art);

            $ok = $this->adCatArt->insertCatArt($newCatArt);

            if($ok){
                header('location:index.php?action=list_cat_art');
            }
        }
        require_once('./views/admin/AdminAddCatArt.php');
    }
}