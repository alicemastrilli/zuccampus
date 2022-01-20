<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    //3 casi
//caso 0: nuova registrazione-> invio credenziali per mail
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione
if($_POST["messaggio_action"]==0){
//Load Composer's autoloader
require 'composer/vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$testo = "La registrazione presso Zuccampus è andata a buon fine, benvenuto mel mondo delle zucche! Ecco le tue credenziali per accedere a Zuccampus: 
            username: ".$_POST["username"] . " password: ".$_POST["password"];
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
    $mail->addAddress($_POST["mail"], $_POST["username"]);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Benvenuto in Zuccampus!';
    $mail->Body    = $testo;
    $mail->send();
    echo 'Benvenuto in Zuccampus! Controlla la tua casella di posta per visualizzare le credenziali.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} elseif ($_POST["messaggio_action"]==1){
    $ordine = $_POST["ordine"];
    $_POST["testo"] = "Gentile ". $_SESSION["username"] . " la sua azienda agricola ha ricevuto un nuovo ordine da parte di: ".$ordine["username"];
    $_POST["data"] = $ordine["data_ordine"]; 
    $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?id=". $ordine["id_ordine"];
    require_once "processa-messaggio.php";
} elseif ($_POST["messaggio_action"] ==2) {
    $ordine = $_POST["ordine"];
    $campus_info = $_POST["campus_info"];
    $_POST["testo"] = "Gentile ". $_SESSION["username"] . " l'ordine di ".$ordine["username"]. "arriverà in giornata! ";    
    $_POST["data"] = date_format(computeDeliveryTime($ordine, $campus_info)[0], "Y-m-d");     
    $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?id=". $ordine["id_ordine"];
    require_once "processa-messaggio.php";
} elseif ($_POST["messaggio_action"] == 3) {
    $recensione = $_POST["recensione"];
    $_POST["testo"] = "Gentile ". $_SESSION["username"] . ", il cliente ".$recensione["username"]. "ha lasciato una recensione! ";   
    $_POST["link"] = "recensione.php?id=". $recensione["id"];
    require_once "processa-messaggio.php";
}
?>