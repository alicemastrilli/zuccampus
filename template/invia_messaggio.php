<!DOCTYPE html>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/invia_messaggio.css" /> 
  <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<script>
  $(document).ready(function(){
    $.get("template/header.php",function(){
      $num = $(".notify-badge").text();
      
//        $(".notify-badge").text(++$num);
    })
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
?>
<?php if($_POST["messaggio_action"]==0) {
$testo = "La registrazione presso Zuccampus è andata a buon fine, benvenuto mel mondo delle zucche! Ecco le tue credenziali per accedere a Zuccampus: 
username: ".$_SESSION["username"] . " password: ".$_POST["password"];
}elseif ($_POST["messaggio_action"]==1){
  $msg = setMessageText(1, $_POST["ordine"]);
}elseif ($_POST["messaggio_action"]==2){
  $msg = setMessageText(2, $_POST["ordine"]);
} else if($_POST["messaggio_action"]==3){
  $msg = setRecensioneMessageText();
}
  ?>

<script>
  $("document").ready(function(){
    $(".toast").fadeOut(15000);
  })
</script>
<div class="toast  show  col-12 ">
  <div class="toast-header col-12  text-center text-black">
    Nuovo messaggio
    <div class="col-6">
      </div>
    <button type="button" class="btn-close float-end text-black " data-bs-dismiss="toast"></button>
    
  </div>
  <div class="toast-body col-12 text-black">
  <?php echo $msg[1]["testo"];?>
  </div>
</div>
</div>
<div class="col-3"></div>
<?php
if($_POST["messaggio_action"]==0) {
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
    $mail->addAddress($_POST["mail"], $_SESSION["username"]);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Benvenuto in Zuccampus!';
    $mail->Body    = $_POST["testo"];
    $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
$_POST["info"]=array("testo"=>array(), "agr"=>array());
  foreach($msg as $x){
    array_push($_POST["info"]["testo"], $x["testo"]);
    array_push($_POST["info"]["agr"], $x["agr"]);
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
} 


}require_once "processa-messaggio.php";
?>