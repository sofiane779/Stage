<?php ob_start();?>

 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline fw-bold mb-4 mt-4">Modification du produit N°: 000<?=$editVet->getId_vet();?> </h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
 
                    <div class="col fw-bold">
                        <label for="modele">Modèle</label>
                        <input type="text" id="modele" name="modele" class="form-control" value="<?=$editVet->getModele();?>" >
                    </div>
                    <div class="col fw-bold">
                        <label for="cat">Catégorie</label>
                        <select id="cat" name="cat" class="form-select">

                        <option value="<?=$editVet->getCategories()->getId_cat();?>">
                         <?php
                         foreach ($tabCat as $cat) { 
                             if( $cat->getId_cat() == $editVet->getCategories()->getId_cat()) {
                                 echo $cat->getNom_cat();
                                }
                            }
                        ?>
                        </option>

                        <?php foreach ($tabCat as $cat) { if( $cat->getId_cat() != $editVet->getCategories()->getId_cat()) {?>
                            <option value="<?=$cat->getId_cat();?>"><?=$cat->getNom_cat();?></option>
                        <?php }}; ?>

                        </select>
                    </div>
                    <div class="col fw-bold">
                        <label for="size">Taille</label>
                        <select id="size" name="size" class="form-select">

                        <option value="<?=$editVet->getSize()->getId_size();?>">
                         <?php
                         foreach ($tabSize as $size) { 
                             if( $size->getId_size() == $editVet->getSize()->getId_size()) {
                                 echo $size->getNom_size();
                                }
                            }
                        ?>
                        </option>

                        <?php foreach ($tabSize as $size) { if( $size->getId_size() != $editVet->getSize()->getId_size()) {?>
                            <option value="<?=$size->getId_size();?>"><?=$size->getNom_size();?></option>
                        <?php }}; ?>

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control"  value="<?=$editVet->getPrix();?>">
                    </div>
                    <div class="col fw-bold">
                        <label for="quantite">Quantité</label>
                        <input type="number" id="quantite" name="quantite" class="form-control" value="<?=$editVet->getQuantite();?>" >
                    </div>
                    <div class="col fw-bold">
                        <label for="couleur">Couleur</label>
                        <input type="text" id="couleur" name="couleur" class="form-control" value="<?=$editVet->getCouleur();?>"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
                    <div class="col">
                        <img src="./assets/images/<?=$editVet->getImage();?>" alt="" width="200" class="img-thumbnail mt-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="desc">Description</label>
                        <textarea id="desc" name="desc" class="form-control"  rows="5"><?=$editVet->getDescriptions();?></textarea>
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