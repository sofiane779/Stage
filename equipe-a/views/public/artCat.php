<?php ob_start(); ?>

<div class="container mt-3" id="lolo">
        <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
         
          
          <div class="row my-3" >
         
              <div class="col-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach($articles as $article){ ?>
                    <div class="col"id="card-shop">
                     <h1 class="text-center text-primary"><?=$article->getCategorie()->getNom_cat_art();?></h1>
                      <div class="card">
                        <img src="./assets/images/<?=$article->getImage();?>" class="card-img-top" height="300" alt="...">
                        <div class="card-body">
                          <h5 class="text-center  card-title">  <?=$article->getTitre();?></h5>
                          <p class="card-text"><?=$article->getContenu();?></p>
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             Coach
                              <span class="badge text-primary rounded-pill"><?=$article->getAuteur();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Date:
                              <span class="badge text-primary rounded-pill"><?=$article->getDate();?></span>
                            </li>

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
                      <?php foreach($tabArt as $art ){ ?>
                      <li class="list-group-item text-center">
                      <a class="btn text-center" href="index.php?id=<?=$art->getId_cat_art();?>"><?=ucfirst($art->getNom_cat_art());?></a>
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