
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
              <th>Titre</th>  
              <th>Contenu</th>
              <th>Image</th>
              <th>Auteur</th>
              <th>Date</th>
              <th>Catégorie</th>
              <th colspan="2" class="text-center">Actions</th>
          </tr>
      </thead>
      <tbody>
          
          <tr>
          <?php if(is_array($items)){ foreach ($items as  $item) { ?>
              <td><?=$item->getId_art();?></td>
              <td><?=$item->getTitre();?></td>
              <td><?=$item->getContenu();?></td>
              <td><img src="./assets/images/<?=$item->getImage();?>" alt="" width="100"></td>
              <td><?=$item->getAuteur();?></td>
              <td ><?=$item->getDate();?></td>
              <td><?=$item->getCategorie()->getNom_cat_art();?></td>
              <td class="text-center">
                <a class="btn btn-warning" href="index.php?action=edit_art&id=<?=$item->getId_art();?>">
                    <i class="fas fa-pen"></i>
                </a>
              </td>
              
              <td  class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_art&id=<?=$item->getId_art();?>"
                    onclick="return confirm('Etes vous sûr de vouloir supprimer ce produit ?')">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
              
          </tr>
          <?php }}else{ echo"<tr class='text-center text-danger'><td colspan='10' >".$items."</td></tr>";} ?>
      </tbody>
  </table>
<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>
