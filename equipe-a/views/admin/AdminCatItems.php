
<?php ob_start(); ?>
<h1 class="display-6 font-monospace text-decoration-underline mt-5 fw-bold">Liste Catégories</h1>
  <table class="table table-striped mt-5 ">
      <thead class="bg-secondary text-white text-center">
          <tr>
              <th>Id</th>
              <th>Nom</th>
              <th colspan="2" class="text-center">Actions</th>
          </tr>
      </thead>
      <tbody class="text-center">
          <?php foreach ($allCat as  $cat) { ?>
          <tr>
              <td><?=$cat->getId_cat();?></td>
              <td><?=$cat->getNom_cat();?></td>
              <td class="text-center">
              <a class="btn btn-warning" href="index.php?action=edit_cat&id=<?=$cat->getId_cat();?>">
                <i class="fas fa-pen"></i>
              </a>
              </td>
              <!-- <?php if($_SESSION['Auth']->id_g != 3 ){ ?> -->
              <td  class="text-center">
                <a class="btn btn-danger" href="index.php?action=delete_cat&id=<?=$cat->getId_cat();?>"
                    onclick="return confirm('Etes vous sûr de vouloir supprimer cette categorie ?')">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
              <!-- <?php } ?> -->
          </tr>
          <?php } ?>
      </tbody>
  </table>
  


<?php 
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
?>
