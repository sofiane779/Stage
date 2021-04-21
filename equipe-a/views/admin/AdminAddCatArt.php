<?php ob_start();?>

 <div class="container">
     <div class="row">
         <div class="col-6 offset-3 fw-bold">
         <h1 class="display-6 text-center text-decoration-underline fw-bold mt-3 mb-3">Ajout d'une catégorie</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                
                 <label for="categorie">Catégorie</label>
                 <input type="text" id="categorie" name="categorie" class="form-control" placeholder="Entrez une catégorie...">
                <button type="submit" class="btn btn-primary fw-bold col-12 mt-2" name="soumis">Ajouter</button>
                </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>