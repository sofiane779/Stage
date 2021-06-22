<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equipe-A Sport</title>
  <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/templateFooter.css">
  <link rel="stylesheet" href="./assets/css/templateShop.css">
  <link rel="stylesheet" href="./assets/css/templateAct.css">
  <link rel="stylesheet" href="./assets/css/templateContact.css">
  <link rel="stylesheet" href="./assets/css/templateApropos.css">
</head>
<body style="background-color: #f5f5f5;">  
    <header role="header" style="background-color: #2A262B">

    <section class="ftco-section " >
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
          <a href="index.php">
            <img class="logo" src="./assets/images/EAOG1.png" alt="logo" width="150">
          </a>
				</div>
			</div>
		</div>
		
		<div class="container-fluid px-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<!-- <a class="navbar-brand" href="index.html">Logistica <span>Architecture Agency</span></a> -->
						</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="#" class="searchform order-lg-last">
			          <div class="form-group d-flex">
			            <input type="search" class="form-control " placeholder="Rechercher">
			            <button type="submit" placeholder="" class="form-control search btn btn-sm text-white " ><i class="fas fa-search" ></i></button>
			          </div>
			        </form>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex ">
		    			<a href="https://fr-fr.facebook.com/EquipeASport/" class="text-white" target="_blank" ><i class="fab fa-facebook"></i></a>
              <a href="https://www.youtube.com/channel/UCLRt_dZtyMMvZnBwinIkBDA" class="text-white" target="_blank"><i class="fab fa-youtube"></i></a>
		    			<a href="https://www.instagram.com/equipeasport/?hl=fr" class="text-white" target="_blank"><i class="fab fa-instagram"></i></a>
              <!-- <a href="#" class="d-flex align-items-center justify-content-center"><i class="fab fa-instagram"></i></a> -->
		    		</p>
	        </div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg text-white ftco_navbar  ftco-navbar-light" id="ftco-navbar" style="background-color: #2A262B">
	    <div class="container-fluid">
	    
	      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto fw-bold ">
	        	<li class="nav-item active"><a href="index.php?action=articles" class="nav-link m-2"><i class="fas fa-home"></i> Accueil</a></li>
	        	<li class="nav-item"><a href="index.php?action=shop" class="nav-link m-2 "><i class="fas fa-tshirt"></i> Shop</a></li>
	        	<li class="nav-item"><a href="index.php?action=apropos" class="nav-link m-2 "><i class="fas fa-question-circle"></i> A propos</a></li>
	          <li class="nav-item"><a href="index.php?action=contact" class="nav-link m-2 "><i class="fas fa-envelope"></i> Contact</a></li>
            <li class="nav-item"><a href="index.php?action=remove_cart" class="nav-link m-2 "><i class="fas fa-shopping-bag"></i> Panier <span  >
                <?php 

                    if(isset($_SESSION['cart'])){

                      $nb_cart = sizeof($_SESSION['cart']);
                      echo $nb_cart;
                    }


                ?>
                  </span></a>


          </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    </section>
    </header>  
<main class="contenu">
    <?=$contenu;?>
</main>
<!-- Remove the container if you want to extend the Footer to full width. -->
<div id="boost">
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #2A262B"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Equipe A sport
            </h6>
            <p>
              Equipe-a sport est une association a but non-lucrative régit sous la loi de 1905.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Menu
            </h6>
            <p>
              <a href="index.php?action=articles" class="text-white">Accueil</a>
            </p>
            <p>
              <a href="index.php?action=shop" class="text-white">Shop</a>
            </p>
            <p>
              <a href="index.php?action=apropos" class="text-white">A propos</a>
            </p>
            <p>
              <a href="index.php?action=contact" class="text-white">Contact</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Site</h6>
            <p> Conditions générales</p>
            <p> F.A.Q</p>
            <a href="index.php?action=confidentialite"> Politique de confidentialité</a>
            <!-- <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2021 Copyright:
              <a class="text-white" href="index.php"
                 >Equipe-A sport</a
                >
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Facebook -->
            <a href="https://fr-fr.facebook.com/EquipeASport/"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               target="_blank"
               ><i class="fab fa-facebook-f" ></i
              ></a>
            <!-- Google -->
            <a href="https://www.youtube.com/channel/UCLRt_dZtyMMvZnBwinIkBDA"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               target="_blank"
               ><i class="fab fa-youtube"></i
              ></a>
            <!-- Instagram -->
            <a href="https://www.instagram.com/equipeasport/?hl=fr"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               target="_blank"
               ><i class="fab fa-instagram"></i
              ></a>
          </div>
        </div>
      </section>
    </div>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="./assets/js/scriptStripe.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./assets/js/templatePublic.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
</body>
</html>