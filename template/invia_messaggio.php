<!DOCTYPE html>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/invia_messaggio.css"/> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script  src="./js/jquery-3.4.1.min.js"></script>
</head>


  <script>
  $("document").ready(function(){
    $(".toast").fadeOut(10000);
  })
</script>

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    //3 casi
//caso 0: nuova registrazione-> invio credenziali per mail
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione
//caso 4: invio notifica all'agricoltore che il prodotto è in esaurimento;
?>
<?php if($_POST["messaggio_action"]==0) {
$testo = "La registrazione presso Zuccampus e' andata a buon fine, benvenuto mel mondo delle zucche! Ecco le tue credenziali per accedere a Zuccampus: 
username: ".$_SESSION["username"] . " password: ".$_POST["password"];
$testo_messaggio= "Registrazione avvenuta con succeso! Controlla la tua casella di posta per visualizzare le credenziali!";
$username=$_SESSION["username"];
$mail =$_POST["mail"];
$subject = 'Benvenuto in Zuccampus!';
}elseif ($_POST["messaggio_action"]==1){
  $msg = setMessageText(1, $_POST["ordine"]);
  $testo_messaggio = $msg[1]["testo"];
}elseif ($_POST["messaggio_action"]==2){
  $msg = setMessageText(2, $_POST["ordine"]);
  $testo_messaggio = $msg[1]["testo"];

} else if($_POST["messaggio_action"]==3){
  $msg = setRecensioneMessageText();
  $testo_messaggio = $msg[1]["testo"];

} else if($_POST["messaggio_action"] == 4){
  $msg=  setFineProdottoText($_POST["zucca"]);
  $testo_messaggio = $msg[0]["testo"];
  $email = $dbh->getAgricoltoreOfAzienda($_POST["zucca"][1])[0]["email"];
  $username = $dbh->getAgricoltoreOfAzienda($_POST["zucca"][1])[0]["username"];
  $subject='Prodotto in esaurimento!';

  $testo = $testo_messaggio;

}

  ?>

<?php if ($_POST["messaggio_action"]!=2 && $_POST["messaggio_action"]!=4):?>
<div class="toast  show  col-12 " id="toast">
  <div class="toast-header col-12  text-center text-black">
    Nuovo messaggio
    <div class="col-6">
      </div>
    <button type="button" class="btn-close float-end text-black " data-bs-dismiss="toast"></button>
  </div>
  <div class="toast-body col-12 text-black">
  <?php echo $testo_messaggio;?>
  </div>
</div>
</div>
<?php endif;?>

<div class="col-3"></div>
<?php
if($_POST["messaggio_action"]==0 || $_POST["messaggio_action"]==4) {
  $_POST["testo"] =$testo;
//Load Composer's autoloader
require 'composer/vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    //$mail->SMTPDebug = 2;    
    $mail->IsHTML(true);                                        //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "zuccampusspa@gmail.com";                     //SMTP username
    $mail->Password   = "Zuccampus22";                               //SMTP password
    $mail->SMTPSecure = 'tls';    
    $mail->SMTPAutoTLS = false;        //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('zuccampusspa@gmail.com', 'Zuccampus');
    $mail->addAddress($email, $username);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $testo;
    $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
$_POST["info"]=array("testo"=>array(), "agr"=>array());
if($_POST["messaggio_action"]!=0){
  array_push($_POST["info"]["testo"], $msg[0]["testo"]);
  array_push($_POST["info"]["agr"], 1);
  if(count($msg)>1){
  array_push($_POST["info"]["testo"], $msg[1]["testo"]);
  array_push($_POST["info"]["agr"], 0);
  }
    
   
    if($_POST["messaggio_action"] ==1){
    $ordine = $_POST["ordine"];
    $_POST["data"] = $ordine["data_ordine"]; 
    $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?id=". $ordine["id_ordine"];
    $_POST["ordine"] = $ordine;
  } elseif ($_POST["messaggio_action"] ==2) {
    $ordine = $_POST["ordine"];
    $campus_info = $_POST["campus_info"];
    $_POST["data"] = date_format(computeDeliveryTime($ordine, $campus_info)[0], "Y-m-d");     
    $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?id=". $ordine["id_ordine"];
    $_POST["ordine"] = $ordine;
} elseif ($_POST["messaggio_action"] == 3) {
    $recensione = $_POST["recensione"];

    $_POST["data"] = $recensione[5];
    $_POST["ora"] = date('H:i');
    $_POST["nome_azienda"] = $recensione[2];
    $_POST["link"] = "lista_recensioni.php";
}  elseif($_POST["messaggio_action"] == 4){
    $_POST["data"] = date('Y-m-d');
    $_POST["ora"] = date('H:i');
    $_POST["nome_zucca"] = $_POST["zucca"][0];
    $_POST["link"] = "";
}
require "processa-messaggio.php";

  
}
?>