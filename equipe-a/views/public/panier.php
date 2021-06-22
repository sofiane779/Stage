<?php ob_start();
var_dump($_SESSION['cart']);
?>

<div class="container">

<div class="display-3 text-center m-5"> Mon Panier</div>

<div class="row mt-5">
  <div class="col-8">
    <?php 
      if(!isset($_SESSION['cart'])){

        $mess = 'votre panier est vide...';

      }else{

        $prixTotal = 0;

        foreach($_SESSION['cart'] as $key => $cart){ 
          
    ?>
    
    <div class="row">
      <div class="card mb-3" >
        <div class="row g-0">
          <div class="col-md-4 mt-2">
            <img src="./assets/images/<?=$cart['image']?>" width="200" alt="<?=$cart['modele']?>" >
          </div>
          <div class="col-md-8">
            <div class="card-body">
            <h3><?=$cart['modele']?></h3>

            <p class="card-text price text-end fs-3">
              <?=$cart['prix']?>€<input class="priceItem " type="hidden" value="<?=$cart['prix'];?>">
            </p>

            <h6>Quantité</h6>
            <p class="" >
            <input type="number" step="1" name="quant"  min="1" max="10" class="qtItem form-control" width="100" aria-label="Search">
            </p>
            <h6>Sous total</h6>
            <p class="sousTotal text-end"> </p>
              
              <a class="btn btn-danger card-text text-end" href="index.php?action=remove_cart&id=<?=$cart['id']?>">Supprimer cet article</a>
      
              <a class="btn btn-warning" href="index.php?action=shop">Retourner à mes achats</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php  }}?>
    <?php if(isset($mess)){ ?>
    <div class="alert alert-danger text-center "><?= $mess;?></div>
  <?php } ?>
  </div>
    <div class="col-3 mx-5">
      <h2 class="text-center fs-2">Validation</h2>
      <form class="mt-5">

        <label for="email_client">Email*</label>
        <input type="email" id="email_client" name="email_client" class="form-control" required placeholder="Votre email svp...">

        <label for="nom_client">Nom*</label>
        <input type="text" id="nom_client" class="form-control" name="nom_client"  required  placeholder="Votre Nom svp...">

        <label for="prenom_client">Prenom*</label>
        <input type="text" id="prenom_client" name="prenom_client"  class="form-control" required  placeholder="Votre prénom svp...">

        <label for="tel_client">Tel*</label>
        <input type="text" id="tel_client" name="tel_client"  class="form-control" required  placeholder="Votre Tel svp...">

        <label for="adresse">Adresse*</label>
        <input type="text" id="adresse" name="adresse"  class="form-control " required  placeholder="Votre adresse svp...">

        <label for="ville">Ville*</label>
        <input type="text" id="Ville" name="Ville"  class="form-control " required  placeholder="Votre Ville svp...">

        <!-- <label for="email">Email*</label>
        <input type="email" id="email" class="form-control" placeholder="Votre email svp...">
        <input type="hidden" id="quant" class="form-control" min="1" value="1">
        <input type="hidden" id="ref" value="<?= $id; ?>">
        <input type="hidden" id="name_prod" value="<?= $modele; ?>">
        <input type="hidden" id="price" value="<?= $prix; ?>"> -->
        <p class=""> Total</p>
        
        <p class="text-center border  fs-2" id="totalG" ></p>

        <button id="checkout-button" class="btn btn-warning col-12 mt-2" name="envoi"><a class="btn text-white color"
                href="index.php?action=list_com">Commander</a></button>

        <button class="bg-secondary text-white mt-3 mb-5 active" ><a href="index.php?action=shop">Retour au shop</a></button>
      </form>
    </div>
  </div>
</div>


<?php
$contenu = ob_get_clean();
require_once('views/public/templatePublic.php');
?>