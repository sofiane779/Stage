<?php ob_start();?>

 <div class="container">
 <h1 class="text-center mt-3 mb-3 fw-bold text-decoration-underline">Modification de Categorie</h1>
     <div class="row">
         <div class="col-6 offset-3 fw-bold">
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <label for="">Identifiant</label>
                 <input type="text" class="form-control"  value="<?=$cat->getId_cat();?>" readonly>
                 <label for="categorie">Catégorie</label>
                 <input type="text" id="categorie" name="categorie" class="form-control" value="<?=$cat->getNom_cat();?>">
                <button type="submit" class="btn btn-warning col-12 mt-4 fw-bold" name="soumis">Modifier</button>
                </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>