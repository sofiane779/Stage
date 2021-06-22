<?php ob_start(); ?>
<div class="container">
    <h1 class="title-about">Qui sommes-nous ?</h1>
    <div>
        <p class="text-about"><img id="ab_img" src="./assets/images/logo_vert.jpg" alt="" width="200px">L'association Equipe-A a été créée en 2011. Nous agissons sur le plan sportif et culturel.

        Notre principal pôle d'activité est celui du sport dans lequel nous proposons des programmes sportifs, du coaching, des stages et séjours sportifs et ludiques. Nos actions ont pour but de permettre à des personnes de tout âge et de toutes catégories socio-professionnelles de pratiquer une activité sportive. Par ce biais, nos adhérents pratiquent une activité de groupe qui leur permet de découvrir de nouvelles disciplines du sport et de se dépasser; ce qui leur donne une plus grande confiance en eux dans la vie quotidienne.
        Notre deuxième pôle, à savoir le pôle culturel est composé d'événements tels que des concerts, spectacles, journées à thème ... Nous avons pour but de permettre à des talents (chanteurs, musiciens, sportifs, comédiens...) de se produire sur scène et de faire découvrir au grand public leur discipline.
        <strong>Ta seule limite c'est toi !</strong>
        </p>
    </div>
</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>