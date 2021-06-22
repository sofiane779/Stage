<?php

class ShopController{

    private $pubsp;
    private $pubctm;
    private $pubsm;

    public function __construct(){
    
        $this->pubsp = new AdminShopModel();
        $this->pubctm = new AdminCategoriesModel();
        $this->pubsm = new ShopModel();
    }

    public function getPubShop(){

        if(isset($_GET['id']) && !empty($_GET['id'])){
            if(isset($_POST['soumis']) && !empty($_POST['search'])){

                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabCat = $this->pubctm->getCategories();
                $wear = $this->pubsp->getShop($search);
                require_once('./views/public/Shop.php');
            }
            $id = trim(htmlentities(addslashes($_GET['id'])));
            $v = new Vetements();
            $v->getCategories()->setId_cat($id);
            $tabCat = $this->pubctm->getCategories();
            $wear = $this->pubsm->findShopByCat($v);
            require_once('./views/public/ShopCat.php');

        }else{

            if(isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabCat = $this->pubctm->getCategories();
                $wear = $this->pubsp->getShop($search);
                require_once('./views/public/Shop.php');
            }
            $tabCat = $this->pubctm->getCategories();
            $wear = $this->pubsp->getShop();
            require_once('./views/public/Shop.php');
        }
    }

    // public function recap(){

    //     if(isset($_POST['envoi']) && !empty($_POST['modele']) && !empty($_POST['prix'])){

    //         $id = htmlspecialchars(addslashes($_POST['id']));
    //         $modele = htmlspecialchars(addslashes($_POST['modele']));
    //         $image = htmlspecialchars(addslashes($_POST['image']));
    //         $prix = htmlspecialchars(addslashes($_POST['prix']));
    //         $couleur = htmlspecialchars(addslashes($_POST['couleur']));
    //         $quantite = htmlspecialchars(addslashes($_POST['quantite']));
    //         $descriptions = htmlspecialchars(addslashes($_POST['descriptions']));

    //         require_once('./views/public/ShopItem.php');
    //     }
    // }

    public function orderShop(){

        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes(htmlspecialchars($_GET['id']));
            require_once('./views/public/OrderForm.php');
        }
    }

    public function addToCart(){

        if(isset($_POST['envoi'])){
            
            $id = htmlspecialchars(addslashes($_POST['id']));
            $modele = htmlspecialchars(addslashes($_POST['modele']));
            $image = htmlspecialchars(addslashes($_POST['image']));
            $prix = htmlspecialchars(addslashes($_POST['prix']));
            $couleur = htmlspecialchars(addslashes($_POST['couleur']));
            $quantite = htmlspecialchars(addslashes($_POST['quantite']));
            $descriptions = htmlspecialchars(addslashes($_POST['descriptions']));
            $quant = htmlspecialchars(addslashes($_POST['quant']));


            if(isset($_SESSION['cart'])){
                //$dispo = false;
                

                $items_id = array_column($_SESSION['cart'],"id"); //cible une colonne et recupere toute la colonne
                
                    if(in_array($id, $items_id)){
                        
                        //$dispo = true;
                        echo'Cet article est deja ajouté';
                    
                    }else{
                        
                        $nb_cart = count($_SESSION['cart']);

                        $item_new = [
                                        "id" => $id,
                                        "modele" => $modele,
                                        "image" => $image,
                                        "quantite" => $quantite,
                                        "prix" => $prix,
                                        "couleur"=>$couleur,
                                        "descriptions"=>$descriptions,
                                        "quant"=>$quant
                                    ];

                        //$_SESSION['cart'][$nb_cart] = $item_new;
                        array_push($_SESSION['cart'], $item_new);
                    }
                
            }
            else{
               
                // session_destroy();
                $item_cart = [
                                    "id" => $id,
                                    "modele" => $modele,
                                    "image" => $image,
                                    "quantite" => $quantite,
                                    "prix" => $prix,
                                    "couleur"=>$couleur,
                                    "descriptions"=>$descriptions,
                                    "quant"=>1
                            ];
                
            
                $_SESSION['cart'][0] = $item_cart;//premier produit, tableau associative

            
            }
            
            require_once('./views/public/panier.php');

        }

    }

    public function deleteCart(){

        if(isset($_GET["id"])){
            //unset($_SESSION['cart']);               
            // echo'$_GET["id"]';
            foreach($_SESSION['cart'] as $key =>$cart){

                 if($cart['id'] == $_GET['id']){

                     unset($_SESSION['cart'][$key]);
                    // var_dump($_SESSION['cart']);
                        // header('location:index.php?action=cart');
                    //  echo'<script>window.location"index.php?action=cart"</script>';
                     require_once('./views/public/panier.php');
                    
                }
            }
        }
        require_once('./views/public/panier.php');
    }


    public function payement(){

        if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['quantite'])){
         \Stripe\Stripe::setApiKey('sk_test_51Id9H1LPA37e67Fk1U40rikyEKvGFrQrYld1NfDbg7qCCRmGBi5RrEWt4Q9ioBJ77DZSEIg2C2nJbQinYzWpCUzF00a0SCEdsR');
 
         header('Content-Type: application/json');
 
         $checkout_session = \Stripe\Checkout\Session::create([
         'payment_method_types' => ['card'],
         'line_items' => [[
             'price_data' => [
             'currency' => 'eur',
             'unit_amount' => $_POST['prix']*100,
             'product_data' => [
                 'name' => $_POST['modele'],
                 'images' => ["./assets/images/14P1.png"],
             ],
             ],
             'quantity' => $_POST['quantite'],
         ]],
         'customer_email' => $_POST['email'],
         'mode' => 'payment',
         'success_url' => 'http://localhost/php/Eval/auto/index.php?action=success',
         'cancel_url' => 'http://localhost/php/Eval/auto/index.php?action=cancel',
         ]);
 
         $_SESSION['pay'] = $_POST;
         echo json_encode(['id' => $checkout_session->id]);
        }
     }

    public function confirmation(){

        $newStock = (int)$_SESSION['pay']['nb'] - (int)$_SESSION['pay']['quantite'];
        $article = new Vetements();
        $article->setId_vet($_SESSION['pay']['id']);
        $article->setQuantite($newStock);

        $nbLine = $this->pubm->updateStock($article);

        if($nbLine > 0){
           
            $email = $_SESSION['pay']['email'];
            $marque = $_SESSION['pay']['marque'];
            $prix = $_SESSION['pay']['prix'];
         
            //Load Composer's autoloader
            // require 'vendor/autoload.php';

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'dwwm94@gmail.com';                     //SMTP username
                $mail->Password   = 'mziyzxforjcwijpo';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('dwwm94@gmail.com', 'Equipe-A');
                $mail->addAddress("$email", 'Mr/Mme');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = "
                    <h2>Merci </h2> 
                    <p>Votre achat à été pris en compte !</p>
                    <div>
                    <b> Marque: </b>".$marque."
                    
                    <b> Prix: </b>".$prix."
                    </div>
                ";
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
                    }
                    require_once('./views/public/success.php');
                }

                public function accueil(){
                    require_once('./views/public/Accueil.php');
                }

                public function annuler(){
                    require_once('./views/public/cancel.php');
                }

                public function apropos() {
                    require_once('./views/public/apropos.php');
                }
             
                 public function contact() {
                    require_once('./views/public/contact.php');
                }
            
                 public function validate() {
                    require_once('./views/public/validate.php');
                }
                public function confid() {
                    require_once('./views/public/Confidentialite.php');
                }

}