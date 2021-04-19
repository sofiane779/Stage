
<?php ob_start(); ?>
<div class="text-center text-white mb-3">
<img src="assets/images/EAOG.jpg" alt="" width="150">
</div>
 <div class="row">
     <div class="col-4 offset-8">
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
        <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
        <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search "></i></button>
     </form>
     </div>
 </div>
  <table class="table table-striped text-center mt-3">
      <thead class="bg-dark text-white ">
          <tr>
              <th>Id</th>
              <th>Modèle</th>
              <th>Prix</th>
              <th>Couleur</th>
              <th>Image</th>
              <th>Quantité</th>
              <th>Description</th>
              <th>Catégorie</th>
              <th>Taille</th>
              <th colspan="2" class="text-center">Actions</th>
          </tr>
      </thead>
      <tbody>
          
          <tr>
          <?php if(is_array($vetements)){ foreach ($vetements as  $vetement) { ?>
              <td><?=$vetement->getId_vet();?></td>
              <td><?=$vetement->getModele();?></td>
              <td><?=$vetement->getPrix();?></td>
              <td><?=$vetement->getCouleur();?></td>
              <td><img src="./assets/images/<?=$vetement->getImage();?>" alt="" width="100"></td>
              <td><?=$vetement->getQuantite();?></td>
              <td ><?=$vetement->getDescriptions();?></td>
              <td><?=$vetement->getCategories()->getNom_cat();?></td>
              <td><?=$vetement->getSize()->getNom_size();?></td>
              <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=edit_vet&id=<?=$vetement->getId_vet();?>">
                    <i class="fas fa-pen"></i>
                </a>
              </td>
              
              <td  class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_vet&id=<?=$vetement->getId_vet();?>"
                    onclick="return confirm('Etes vous sûr de vouloir supprimer ce produit ?')">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
              
          </tr>
          <?php }}else{ echo"<tr class='text-center text-danger'><td colspan='10' >".$vetements."</td></tr>";} ?>
      </tbody>
  </table>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>
