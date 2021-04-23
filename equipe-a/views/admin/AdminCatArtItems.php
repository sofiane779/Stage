<?php ob_start();?>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th colspan="2" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allCatArt as$catart){?>
            <tr>
                <td><?= $catart->getId_cat_art();?></td>
                <td><?= $catart->getNom_cat_art();?></td>
                <td class="text-center">
                    <a class="btn btn-warning" href="index.php?action=edit_cat_art&id=<?= $catart->getId_cat_art();?>">
                    <i class="fas fa-pen"></i></a>
                </td>
                 <?php if($_SESSION['Auth']->id_g !=3){ ?> 
                <td class="text-center">
                    <a class="btn btn-danger" href="index.php?action=delete_cat_art&id=<?= $catart->getId_cat_art();?>" 
                    onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">
                    <i class="fas fa-trash"></i></a>
                </td>
                 <?php } ?> 
            </tr>
            <?php }?>
        </tbody>
    </table> 
 <?php
    $contenu = ob_get_clean();
    require_once('./TemplateAdmin.php');
 ?>
 