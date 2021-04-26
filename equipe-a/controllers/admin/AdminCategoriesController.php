<?php

class AdminCategoriesController{

    private $adCat;
    public function __construct(){
    
        $this->adCat = new AdminCategoriesModel();
    }

    public function listCategories(){
        AuthController::isLogged();
        $allCat = $this->adCat->getCategories();
        require_once('./views/admin/AdminCatItems.php');
    }

    public function removeCat(){
         AuthController::isLogged();
         AuthController::accessUser();
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){

            $id = trim($_GET['id']);

            $nbLine = $this->adCat->deleteCat($id);

            if($nbLine > 0){
                header('location: index.php?action=list_cat');
            }
        }
    }

    public function editCat(){
         AuthController::isLogged();
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
           
            $id = trim($_GET['id']);
            $cat = $this->adCat->categoriesItem($id);

            if(isset($_POST['soumis']) && !empty($_POST['categorie'])){

                $categorie = trim(addslashes(htmlentities($_POST['categorie'])));
                $cat->setNom_cat($categorie);
                $nb = $this->adCat->updateCategories($cat);
                
                if($nb > 0){
                    header('location:index.php?action=list_cat');
                }
            }

            require_once('./views/admin/AdminEditCat.php');

        }
    }

    public function addCat(){
        //  AuthController::isLogged();
        if(isset($_POST['soumis']) && !empty($_POST['categorie'])){
            $nom_cat = trim(htmlentities(addslashes($_POST['categorie'])));
            $newCat = new Categories();
            $newCat->setNom_cat($nom_cat);

            $ok = $this->adCat->insertCategories($newCat);
            if($ok){
                header('location:index.php?action=list_cat');
            }
        }
        require_once('./views/admin/adminAddCat.php');
    }
}