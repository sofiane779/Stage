<?php ob_start();?>

 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline fw-bold mb-4 mt-4">Modification du produit N°: 000<?=$editArt->getId_art();?> </h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
 
                    <div class="col fw-bold">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" value="<?=$editArt->getTitre();?>" >
                    </div>
                    <div class="col fw-bold">
                        <label for="cat">Catégorie</label>
                        <select id="cat" name="cat" class="form-select">

                        <option value="<?=$editArt->getCategorie()->getId_cat_art();?>">
                         <?php
                         foreach ($tabArt as $catar) { 
                             if( $catar->getId_cat_art() == $editArt->getCategorie()->getId_cat_art()) {
                                 echo $catar->getNom_cat_art();
                                }
                            }
                        ?>
                        </option>

                        <?php foreach ($tabArt as $catar) { if( $catar->getId_cat_art() != $editArt->getCategorie()->getId_cat_art()) {?>
                            <option value="<?=$catar->getId_cat_art();?>"><?=$catar->getNom_cat_art();?></option>
                        <?php }}; ?>

                        </select>
                    </div>
        
                <div class="row">
                    <div class="col fw-bold">
                        <label for="auteur">Auteur</label>
                        <input type="text" id="auteur" name="auteur" class="form-control"  value="<?=$editArt->getAuteur();?>">
                    </div>
                    <div class="col fw-bold">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?=$editArt->getDate();?>" >
                    </div>
                  
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
                    <div class="col">
                        <img src="./assets/images/<?=$editArt->getImage();?>" alt="" width="200" class="img-thumbnail mt-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="contenu">Contenu</label>
                        <textarea id="contenu" name="contenu" class="form-control"  rows="5"><?=$editArt->getContenu();?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning  col-12 mt-2 fw-bold" name="soumis">Modifier</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>