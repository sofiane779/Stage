<?php ob_start();?>

 <div class="container">
 <h1>Modification du Catalogue</h1>
     <div class="row">
         <div class="col-6 offset-3">
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <label for="">Identifiant</label>
                 <input type="text" class="form-control"  value="<?=$catart->getId_cat_art();?>" readonly>
                 <label for="cat">Catégorie</label>
                 <input type="text" id="cat" name="cat" class="form-control" value="<?=$catart->getNom_cat_art();?>">
                <button type="submit" class="btn btn-warning col-12 mt-2" name="soumis">Modifier</button>
                </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>