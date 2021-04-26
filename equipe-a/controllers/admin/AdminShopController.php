<?php
class AdminShopController{

    private $adwm;

    public function __construct()
    {
        $this->adwm = new AdminShopModel;
        $this->adcat = new AdminCategoriesModel;
        $this->adsize = new AdminSizeModel;
    }

    public function listVetements(){
        AuthController::isLogged();
        if(isset($_POST['soumis']) && !empty($_POST['search'])){

            $search = trim(htmlspecialchars(addslashes($_POST['search'])));
            $vetements = $this->adwm->getShop($search);
            require_once('./views/admin/vetements/AdminVetItems.php');

        }else{
            $vetements = $this->adwm->getShop();
            require_once('./views/admin/vetements/AdminVetItems.php');
        }

    }

    public function addVetements(){
        AuthController::isLogged();
        if(isset($_POST['soumis']) && !empty($_POST['modele']) && !empty($_POST['prix'])){

            $modele = trim(htmlspecialchars(addslashes($_POST['modele'])));
            $prix = trim(htmlspecialchars(addslashes($_POST['prix'])));
            $couleur = trim(htmlspecialchars(addslashes($_POST['couleur'])));
            $quantite = trim(htmlspecialchars(addslashes($_POST['quantite'])));
            $descriptions = trim(htmlspecialchars(addslashes($_POST['desc'])));
            $id_cat = trim(htmlspecialchars(addslashes($_POST['cat'])));
            $id_size = trim(htmlspecialchars(addslashes($_POST['size'])));
            $image = $_FILES['image']['name'];

            $newV = new Vetements();
            $newV->setModele($modele);
            $newV->setPrix($prix);
            $newV->setCouleur($couleur);
            $newV->setQuantite($quantite);
            $newV->setDescriptions($descriptions);
            $newV->getCategories()->setId_cat($id_cat);
            $newV->getSize()->setId_size($id_size);
            $newV->setImage($image);

            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
            $ok = $this->adwm->insertVetement($newV);
            if($ok){
                header('location:index.php?action=list_vet');
            }
        }

        $tabCat = $this->adcat->getCategories();
        $tabSize = $this->adsize->getSize();
        require_once('./views/admin/vetements/AdminAddVet.php');
    }

    public function removeVetement(){
        AuthController::isLogged();
        AuthController::accessUser();
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){

            $id = $_GET['id'];
            $delV = new Vetements();
            $delV->setId_vet($id);
            $nb = $this->adwm->deleteVetement($delV);

            if($nb > 0){
                header('location:index.php?action=list_vet');
            }
        }
    }

    public function editVetement(){
        AuthController::isLogged();
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){

            $id = $_GET['id'];
            $editV = new Vetements();
            $editV->setId_vet($id);
            $editVet = $this->adwm->vetementItem($editV);

            $tabCat = $this->adcat->getCategories();
            $tabSize = $this->adsize->getSize();

            if(isset($_POST['soumis']) && !empty($_POST['modele']) && !empty($_POST['prix'])){

                $modele = trim(htmlentities(addslashes($_POST['modele'])));
                $prix = trim(htmlentities(addslashes($_POST['prix'])));
                $couleur = trim(htmlentities(addslashes($_POST['couleur'])));
                $quantite = trim(htmlentities(addslashes($_POST['quantite'])));
                $descriptions = trim(htmlentities(addslashes($_POST['desc'])));
                $id_cat = trim(htmlentities(addslashes($_POST['cat'])));
                $id_size = trim(htmlentities(addslashes($_POST['size'])));
                $image = $_FILES['image']['name'];

                $editVet->setModele($modele);
                $editVet->setPrix($prix);
                $editVet->setCouleur($couleur);
                $editVet->setQuantite($quantite);
                $editVet->setDescriptions($descriptions);
                $editVet->getCategories()->setId_cat($id_cat);
                $editVet->getSize()->setId_size($id_size);
                $editVet->setImage($image);

                $destination = './assets/images/';
                move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
                $ok = $this->adwm->updateVetement($editVet);
                
                if($ok){
                    header('location:index.php?action=list_vet');
                }
                
            }
            
            require_once('./views/admin/vetements/AdminEditVet.php');
        }



    }
}