<?php ob_start(); ?>
<div class="container">
<h1 class="title-contact">Pour nous contacter, c'est simple !</h1>
<div class="contact text-center">
    <div class="num" >
        <i class="fas fa-phone"></i>
        <p class="par">Tél</p>
        <p class="dit">  06 29 45 75 51</p>
    </div>
    <div class="adresse">
        <i class="fas fa-map-marker-alt"></i> 
        <p class="par">Adresse</p>
        <p class="dit">7 Avenue Jean Moulin </p>
        <p >77200 Torcy</p>  
    </div>
    <div class="mail">
        <i class="far fa-envelope"></i> 
        <p class="par">Mail</p>
        <p class="dit">Equipe-a@gmail.com</p> 
    </div>
</div>
<div class="geo mb-3">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.105024144493!2d2.653654815673631!3d48.837135379285506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60547aba26a3d%3A0x604070d30c7cee32!2s7%20Avenue%20Jean%20Moulin%2C%2077200%20Torcy!5e0!3m2!1sfr!2sfr!4v1619958597543!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>



</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>