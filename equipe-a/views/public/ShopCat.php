<?php ob_start(); ?>

<div class="container mt-3" id="lolo">
        <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/ORDI5.jpg" class="d-block w-100 " style="height:400px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/ORDI6.jpg" class="d-block w-100" style="height:400px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/ORDI7.jpg" class="d-block w-100" style="height:400px" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant </span>
              </button>
          </div> -->
          <!---end carrousel-->
          
          <div class="row my-3">
         
              <div class="col-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach($computeurs as $computeur){ ?>
                    <div class="col">
                     <h1 class="text-center bg-dark text-white"><?=$computeur->getCategorie()->getNom_cat();?></h1>
                      <div class="card">
                        <img src="./assets/images/<?=$computeur->getImage();?>" class="card-img-top" height="300" alt="...">
                        <div class="card-body">
                          <h5 class="bg-secondary text-center text-white card-title">  <?=$computeur->getMarque();?></h5>
                          <p class="card-text"><?=$computeur->getDescription();?></p>
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             Mod??le:
                              <span class="badge text-primary rounded-pill"><?=$computeur->getModele();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ann??e:
                              <span class="badge text-primary rounded-pill"><?=$computeur->getAnnee();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             Prix:
                              <span class="badge bg-primary rounded-pill"><?=$computeur->getPrix();?> ???</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Quantit??:
                              <span class="badge bg-primary rounded-pill"><?=$computeur->getQuantite();?></span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
         
              </div>
            </div>
              <!--end cards-->
              <div class="col-4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
                        <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
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
              </div>
          
    </div>
 
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>