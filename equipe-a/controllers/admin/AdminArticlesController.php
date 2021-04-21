<?php 

class AdminArticlesController{

    private $adart;

    public function __construct(){
    
        $this->adart = new AdminArticlesModel();
        $this->adcatart = new AdminCatArtModel();
    }

    public function listArticles(){

        if(isset($_POST['soumis']) && !empty($_POST['search'])){

            $search = trim(htmlspecialchars(addslashes($_POST['search'])));
            $items = $this->adart->getCatArt($search);
            require_once('./views/admin/articles/AdminArticlesItems.php');
        }else{
            $items = $this->adart->getCatArt();
            require_once('./views/admin/articles/AdminArticlesItems.php');
        }
    }

    public function addArticle(){

        if(isset($_POST['soumis']) && !empty($_POST['titre']) && !empty($_POST['contenu'])){

            $titre = trim(htmlentities(addslashes($_POST['titre'])));
            $contenu = trim(htmlentities(addslashes($_POST['contenu'])));
            $date = trim(htmlentities(addslashes($_POST['date'])));
            $auteur = trim(htmlentities(addslashes($_POST['auteur'])));
            $id_cat_art = trim(htmlentities(addslashes($_POST['cat'])));
            $image = $_FILES['image']['name'];

            $newA = new Articles();
            $newA->setTitre($titre);
            $newA->setContenu($contenu);
            $newA->setDate($date);
            $newA->setAuteur($auteur);
            $newA->getCategorie()->setId_cat_art($id_cat_art);
            $newA->setImage($image);

            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
            $ok = $this->adart->insertArticle($newA);
            
            if($ok){
                header('location:index.php?action=list_art');
            }
        }
        $tabArt = $this->adcatart->getCatArt();
        require_once('./views/admin/articles/AdminAddArticles.php');
    }

    public function removeArticle(){

        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){

            $id = $_GET['id'];
            $delA = new Articles();
            $delA->setId_art($id);
            $nb = $this->adart->deleteArticle($delA);

            if($nb > 0){
                header('location:index.php?action=list_art');
            }
        }
    }

    public function editArticle(){

        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){

            $id = $_GET['id'];
            $editA = new Articles();
            $editA->setId_art($id);
            $editArt = $this->adart->articleItem($editA);

            $tabArt = $this->adcatart->getCatArt();

            if(isset($_POST['soumis']) && !empty($_POST['titre']) && !empty($_POST['auteur'])){

                $titre = trim(htmlentities(addslashes($_POST['titre'])));
                $contenu = trim(htmlentities(addslashes($_POST['contenu'])));
                $date = trim(htmlentities(addslashes($_POST['date'])));
                $auteur = trim(htmlentities(addslashes($_POST['auteur'])));
                $id_cat_art = trim(htmlentities(addslashes($_POST['cat'])));
                $image = $_FILES['image']['name'];

                $editArt->setTitre($titre);
                $editArt->setContenu($contenu);
                $editArt->setDate($date);
                $editArt->setAuteur($auteur);
                $editArt->getCategorie()->setId_cat_art($id_cat_art);
                $editArt->setImage($image);

                $destination = './assets/images/';
                move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
                $ok = $this->adart->updateArticle($editArt);

                if($ok > 0){
                    header('location:index.php?action=list_art');
                }
            }
            require_once('./views/admin/articles/AdminEditArticles.php');
        }
    }


}