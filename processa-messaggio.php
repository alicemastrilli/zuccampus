<?php
require_once("bootstrap.php");
//3 casi
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione

$_POST["campus_info"] = $dbh->getAppInfo($templateParams["nome"])[0];

for($i =0; $i<count($_POST["info"]["agr"]); $i++){
//al primo posto ci sono gli agricoltori, cioe in posto 0. In posto 1 utente
//controllo se messaggio è diretto a persona
$arr_username=array();
if($_POST["info"]["agr"][$i] == 0 ){
     $username = htmlspecialchars($_SESSION["username"]);
}
//ho fatto una recensione


//messaggio è diretto all'agricoltore
else{

   if($_POST["messaggio_action"]==3){
        $nome_azienda =$_POST["produttori"];
        $username = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0]["username"];
   }
    //mando l'ordine-->caso 1,2
    //nel caso 4(zucca in esaurimento),mando un array in$_POST["zucca"]
    //nel caso 3 mando una recensione-->in questo caso è gia settata un post produttori
    

 
   
    //settata nel caso in cui si deve inviare il messaggio di prodotto in esaurimento
      else if(isset($_POST["zucca"])){

        $zucca=$_POST["zucca"];
        $username = $dbh->getAgricoltoreOfAzienda($_POST["zucca"][1])[0]["username"];
    }else{
        //entro qui significa che sono caso 1 o 2
        $arr_username = $dbh->getComprendeById($_POST["ordine"]["id_ordine"]);
        var_dump($arr_username);
    }
}

    $testo = htmlspecialchars($_POST["info"]["testo"][$i]);
    $data = htmlspecialchars($_POST["data"]);
    $ora = htmlspecialchars($_POST["ora"]);
    $link = htmlspecialchars($_POST["link"]);

    if( count($arr_username)==0){
        $messaggio = $dbh->checkMessage($username, $data, $ora,$testo);

        if(count($messaggio) == 0 ){
        $dbh->insertMessage($username, $testo, $data, $ora, $link, 0);
        }
    } elseif( count($arr_username)>0){
        foreach($arr_username as $user){
            $messaggio = $dbh->checkMessage($user["username"], $data, $ora,$testo);

            if(count($messaggio) == 0){
            $msg=$dbh->insertMessage($user["username"], $testo, $data, $ora, $link, 0);
            var_dump($msg);
            }
        }
    }
}

if($_POST["messaggio_action"]==1){
    $_POST["info"]="";
    $_POST["messaggio_action"]=2;
  
    require "invia_messaggio.php";
}

?>
