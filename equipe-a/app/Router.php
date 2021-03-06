<?php

require_once('./models/Driver.php');
require_once('./models/Categories.php');
require_once('./app/autoload.php');

 class Router{

     private $ctrca;
     private $ctrv;
     private $ctrcat;
     private $ctrart;
     private $ctru;
     private $ctrg;
     private $ctrpub;
     private $ctrpubsp;

     public function __construct()
   {
        $this->ctrca = new AdminCategoriesController();
        $this->ctrv = new AdminShopController();
        $this->ctrcat = new AdminCatArtController();
        $this->ctrart = new AdminArticlesController();     
        $this->ctru = new AdminUtilisateurController();
        $this->ctrg = new AdminGradeController();
        $this->ctrpub = new ArticlesController();
        $this->ctrpubsp = new ShopController();
       }   
        
    

     public function getPath(){

          try{
            if(isset($_GET['action'])){

                switch($_GET['action']){
                    case 'list_cat':
                        $this->ctrca->listCategories();
                        break;
                    case 'delete_cat':
                        $this->ctrca->removeCat();
                        break;
                    case 'edit_cat':
                        $this->ctrca->editCat();
                        break;
                    case 'add_cat':
                        $this->ctrca->addCat();
                        break;
                    case 'list_vet':
                        $this->ctrv->listVetements();
                        break;
                    case 'add_vet':
                        $this->ctrv->addVetements();
                        break;
                    case 'delete_vet':
                        $this->ctrv->removeVetement();
                        break;
                    case 'edit_vet':
                        $this->ctrv->editVetement();
                        break;
                    case 'list_cat_art':
                        $this->ctrcat->listCatArt();
                        break;
                    case 'delete_cat_art':
                        $this->ctrcat->removeCatArt();
                        break;
                    case 'edit_cat_art':
                        $this->ctrcat->editCatArt();
                        break;
                    case 'add_cat_art':
                        $this->ctrcat->addCatArt();
                        break;
                    case 'list_art':
                        $this->ctrart->listArticles();
                        break;
                    case 'add_art':
                        $this->ctrart->addArticle();
                        break;
                    case 'delete_art':
                        $this->ctrart->removeArticle();
                        break;
                    case 'edit_art':
                        $this->ctrart->editArticle();
                        break;
                    case 'list_u':
                        $this->ctru->listUsers();
                        break;
                    case 'login':
                        $this->ctru->login();
                        break;
                    case 'logout':
                        AuthController::logout();
                        break;
                    case 'register':
                        $this->ctru->addUser();
                        break;
                    case 'accueil':
                        $this->ctrpubsp->accueil();
                        break;
                    case 'articles':
                        $this->ctrpub->getPubArticles();
                        break;
                    case 'shop':
                        $this->ctrpubsp->getPubShop();
                        break;   
                    case 'shop':
                        $this->ctrpubsp->getPubShop();
                        break;    
                    case 'checkout':
                        $this->ctrpubsp->recap();
                        break; 
                    case 'order' :
                        $this->ctrpubsp ->orderShop();
                        break;
                    // case 'pay':
                    //     $this->ctrpub->payement();
                    //     break;
                    // case 'success':
                    //     $this->ctrpub->confirmation();
                    //     break;
                    // case 'cancel':
                    //     $this->ctrpub->annuler();
                    //     break;
                    case 'apropos':
                        $this->ctrpubsp->apropos();
                        break;
                    case 'contact':
                        $this->ctrpubsp->contact();
                        break;
                    case 'confidentialite':
                        $this->ctrpubsp->confid();
                        break;
                    case 'cart':
                        $this->ctrpubsp->addToCart();
                        break; 
                    case 'remove_cart':
                        $this->ctrpubsp->deleteCart();
                        break;
                    // case 'validate':
                    //     $this->ctrpub->validate();
                    //     break;
                    // default:
                    //     throw new Exception('Action non d??finie');
                }     
             }
            else{
                $this->ctrpubsp->accueil();
                session_unset();
                }
        }catch(Exception $e){
            $this->page404($e->getMessage());
         }
    }

   private function page404($errorMsg){

         require_once('./views/notFound.php');
 
   }
 }
      