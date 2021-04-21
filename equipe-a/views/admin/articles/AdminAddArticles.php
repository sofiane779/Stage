<?php ob_start();?>

 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center text-decoration-underline fw-bold mb-4 mt-4">Ajout Article</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col fw-bold">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" >
                    </div>
                    <div class="col fw-bold">
                        <label for="auteur">Auteur</label>
                        <input type="text" id="auteur" name="auteur" class="form-control" >
                    </div>
                      
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>
                    <div class="col fw-bold">
                        <label for="cat">Catégorie</label>
                        <select id="cat" name="cat" class="form-select">
                        <option value="">Choisir</option>
                        <?php foreach ($tabArt as $catart) {; ?>
                            <option value="<?=$catart->getId_cat_art();?>"><?=$catart->getNom_cat_art();?></option>
                        <?php }; ?>
                        </select>
                    </div> 
                </div>
                <div class="row">
                    <div class="col fw-bold">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
              
                </div>
            
                <div class="row">
                    <div class="col fw-bold">
                        <label for="contenu">Contenu</label>
                        <textarea id="contenu" name="contenu" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success fw-bold col-12 mt-2" name="soumis">Ajouter</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>