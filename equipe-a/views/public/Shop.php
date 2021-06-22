<?php ob_start(); ?>


<!-- <div class="container bg-light" id="lol">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/SP9.jpg" class="d-block w-100 " style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP8.jpg" class="d-block w-100" style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP7.jpg" class="d-block w-100" style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP6.jpg" class="d-block w-100" style="height:500px" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next </span>
              </button>
          </div>
          <div class="col-4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
                        <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-light" name="soumis"><i class="fas fa-search"></i></button>
                     </form>
                <div class="card mt-1">
                    <ul class="list-group list-group-flush">
                      <?php foreach($tabCat as $cat ){ ?>
                      <li class="list-group-item text-center">
                        <a class="btn text-center" href="index.php?id=<?=$cat->getId_cat();?>"><?=ucfirst($cat->getNom_cat());?></a>
                      </li>
                     <?php } ?>
                    </ul>
                </div> 
              </div> -->
          <!---end carrousel-->
          <!-- <div class="row my-3">
              <div class="col-10">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach($wear as $vet){ ;?>
                    <div class="col">
                      <div class="card bg-dark text-white">
                        <img src="./assets/images/<?=$vet->getImage();?>" class="card-img-top" width="150" alt="...">
                        <div class="card-body">
                          <h5 class="bg-dark text-center text-white card-title"> <?=$vet->getModele();?></h5>
                          <p class="card-text"></p>
                          <ul class="list-group">
                          <li class="list-group-item d-flex text-center fw-bold">
                          <?=$vet->getDescriptions();?> 
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Couleur :
                            <span class="text-primary  fw-bold"><?=$vet->getCouleur();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Taille:
                            <span class="text-primary rounded-pill fw-bold"><?=$vet->getSize()->getNom_size();?></span> 
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Prix:
                            <span class="text-primary rounded-pill fw-bold"><?=$vet->getPrix();?>€</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              <form action="index.php?action=checkout" method="post">
                              <input type="hidden" name="id"  value="<?=$vet->getId_vet();?>">
                                <input type="hidden" name="modele"  value="<?=$vet->getModele();?>">
                                <input type="hidden" name="prix" value="<?=$vet->getPrix();?>">
                                <input type="hidden" name="image" value="<?=$vet->getImage();?>">
                                <input type="hidden" name="descriptions" value="<?=$vet->getDescriptions();?>">
                                <?php if($vet->getQuantite() > 0){ ?>
                                  <button type="submit" class="btn btn-success" name="envoi">Acheter</button>
                                <?php } ?>
                              </form>
                              <strong class="badge rounded-pill">
                                <?php if($vet->getQuantite() == 0){ ?>
                                <a href="index.php?action=order&id=<?=$vet->getId_vet();?>" class="btn btn-warning text-white">
                                   Commander
                                </a>
                                <?php } ?>
                              </strong>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
         
              </div>
            </div> -->
              <!--end cards-->
<!-- <div class="container mt-5 mb-5" >
    <div class="d-flex justify-content-center row" >
        <div class="col-md-10 " >
            <div class="row p-2 border rounded " id="card-shop">
            <?php foreach($wear as $vet){ ;?>
                <div  class="col-md-3 mt-1 mb-3"><img class="img-fluid img-responsive rounded product-image" src="./assets/images/<?=$vet->getImage();?>"></div>
                <div class="col-md-6 mt-1 " >
                    <h5 class="fw-bold"><?=$vet->getModele();?></h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2 " id="star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                    </div>
                    
                      <div class="mt-1 mb-1 spec-1"><span><?=$vet->getCouleur();?></span>
                    </div>
                    <?php foreach($tabCat as $cat ){ ?>
                    <div class="mt-1 mb-1 spec-1"><span><?=$vet->getSize()->getNom_size();?></span><span> <?=$cat->getNom_cat();?></span></div>
                    <?php } ?>
                    <p class="text-justify text-truncate para mb-0"><?=substr($vet->getDescriptions(),0, 75);?><br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-5">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1 text-primary fw-bold"><?=$vet->getPrix();?> €</h4>
                    </div>
                    <h6 class="text-success">Livraison gratuite</h6>
                    <div class="d-flex flex-column mt-4"><button class="btn btn-success btn-sm mt-2" type="button">Ajouter au panier</button></div>
                </div>    
                 <?php } ?> 
            </div>
        </div>
    </div>
</div> -->
<div class="container mt-5">
<div class="row my-3 " >
              <div class="col-12 mb-5">
                <div class="row row-cols-1 row-cols-md-3 g-4" id="card-size">
                <?php foreach($wear as $vet){ ;?>
                    <div class="col" >
                      <div class="card text-white" id="card-color">
                        <img src="./assets/images/<?=$vet->getImage();?>" class="card-img-top mt-5" width="150" alt="...">
                        <div class="card-body">
                          <h5 class=" text-center text-white card-title fw-bold"> <?=$vet->getModele();?></h5>
                          <p class="card-text"><?=substr($vet->getDescriptions(),0, 75);?></p>
                          <ul class="list-group">
                          <li class="list-group-item d-flex text-center fw-bold">
                          Couleur:<span class="badge text-primary rounded-pill "><?=$vet->getCouleur();?></span>  
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                          Prix:  <?=$vet->getPrix();?> €
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                                
                      
                            </li>
                               <form action="index.php?action=cart" method="post">
                                 <div><input type="hidden" name="quant" value="1"></div>
                                <input type="hidden" name="id"  value="<?=$vet->getId_vet();?>">
                                <input type="hidden" name="modele"  value="<?=$vet->getModele();?>">
                                <input type="hidden" name="couleur"  value="<?=$vet->getCouleur();?>">
                                <input type="hidden" name="descriptions" value="<?=$vet->getDescriptions();?>">
                                <input type="hidden" name="image" value="<?=$vet->getImage();?>">
                                <input type="hidden" name="prix" value="<?=$vet->getPrix();?>">
                                <input type="hidden" name="quantite" value="<?=$vet->getQuantite();?>">
                                
                                <div class="d-flex flex-column text-center"><button class="btn btn-success btn-sm mt-2" type="submit" name="envoi">Ajouter au panier</button></div> 
                               </form>
                            </li> 
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
         
              </div>
            </div> </div> 
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>