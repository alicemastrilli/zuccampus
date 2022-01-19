<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/messaggio.css" > 
        <script type="text/javascript" src="./js/window_functions.js"></script> 
    </head>
    <div class="row">
    <a class="col-3"  onclick="goBack()">
      <img src="./icons/freccia.png" alt="freccia indietro">
    </a>
    </div>
    <?php if (count($templateParams["messaggi"])==0):?>
        <?php $_POST['testo'] ='ciao';
    $_POST['data']='2021-02-05';
    $_POST['ora']='21:12';

    require $templateParams["aggiungi"];
    ?>
        <p >La casella di posta è vuota</p>
    <?php else :?>
        <?php foreach($templateParams["messaggi"] as $messaggio):?>
<p class="text-center"><?php echo $messaggio["data"]?></p>
    <div class="text-center mx-3">
    <article class=" text-center mb-2 ">
        <span class="p-2">Gentile Mario, la sua azienda agricola ha ricevuto un  nuovo ordine: 2 x zucca piccola. <a href="#">Clicchi qui</a>  <span > per visualizzare l’ordine.
           <br> <span class="px-3 d-flex flex-row-reverse "><small>16:30</small> </span>
    </article> 
    </div>  
  <hr/>

  <?php endforeach;?>
  <?php endif;?>
  </html>