<?php ob_start(); ?>


 <div class="container " id="lol">
        <div id="carousel1" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/SP8.jpg" class="d-block w-100 " style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP6.jpg" class="d-block w-100" style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP11.jpg" class="d-block w-100" style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP12.jpg" class="d-block w-100" style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/SP13.jpg" class="d-block w-100" style="height:500px" alt="...">
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
          <div class="col-4 mb-5 mt-3 ">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group border border-dark">
                        <input class="form-control pl-3 " type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-light bg-secondary" name="soumis"><i class="fas fa-search"></i></button>
                     </form>
                <div class="card mt-1 border border-dark">
                    <ul class="list-group list-group-flush">
                      <?php foreach($tabArt as $art ){ ?>
                      <li class="list-group-item text-center border border-dark">
                        <a class="btn text-center" href="index.php?id=<?=$art->getId_cat_art();?>"><?=ucfirst($art->getNom_cat_art());?></a>
                      </li>
                     <?php } ?>
                    </ul>
                </div> 
              </div> 
          <!--end carrousel 
          <div class="row my-3 " >
              <div class="col-12 mb-5">
                <div class="row row-cols-1 row-cols-md-3 g-4" id="card-size">
                    <?php foreach($articles as $article){ ?>
                    <div class="col" >
                      <div class="card text-white" id="card-color">
                        <img src="./assets/images/<?=$article->getImage();?>" class="card-img-top mt-5" width="150" alt="...">
                        <div class="card-body">
                          <h5 class=" text-center text-white card-title fw-bold"> <?=$article->getTitre();?></h5>
                          <p class="card-text"><?=$article->getContenu();?></p>
                          <ul class="list-group">
                          <li class="list-group-item d-flex text-center fw-bold">
                          <?=$article->getAuteur();?> 
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            <?=$article->getDate();?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                                <?=$article->getCategorie()->getNom_cat_art();?>
                            </li>
                              <form action="index.php?action=checkout" method="post">
                              <input type="hidden" name="id"  value="<?=$article->getId_art();?>">
                                <input type="hidden" name="marque"  value="<?=$article->getTitre();?>">
                                <input type="hidden" name="modele" value="<?=$article->getContenu();?>">
                                <input type="hidden" name="image" value="<?=$article->getImage();?>">
                                <input type="hidden" name="prix" value="<?=$article->getDate();?>">
                                <input type="hidden" name="quantite" value="<?=$article->getAuteur();?>">
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
         
              </div>
            </div>  -->
              <!--end cards-->


              <div class="container mt-5 mb-5" >
    <div class="d-flex justify-content-center row" >
        <div class="col-md-12 " >
            <div class="row p-2 border rounded " id="card-shop">
            <?php foreach($articles as $article){ ;?>
                <div  class="col-md-3 mt-1 mb-3"><img class="img-fluid img-responsive rounded product-image" src="./assets/images/<?=$article->getImage();?>" width="150"></div>
                <div class="col-md-6 mt-1 " >
                    <h5 class="fw-bold"><?=$article->getTitre();?></h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2 " id="star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>  donnez votre avis</span>
                    </div>
                    
                      <div class="mt-1 mb-1 spec-1"><span><?=$article->getDate();?></span>
                    </div>
                   
                    <p class="text-justify text-truncate para mb-0"><?=substr($article->getContenu(),0, 75);?><br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-5">
                    <div class="d-flex flex-row align-items-center ">
                      <h4 class="ml-3  fw-bold"><?=$article->getAuteur();?> </h4>
                    </div>
                    <!-- <h6 class="text-success">Livraison gratuite</h6>
                    <div class="d-flex flex-column mt-4"><button class="btn btn-success btn-sm mt-2" type="button">Ajouter au panier</button></div> -->
                </div>    
                 <?php } ?> 
            </div>
        </div>
    </div>
</div>

	</div>
</div>



<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>