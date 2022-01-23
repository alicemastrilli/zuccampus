<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/messaggio.css" > 
        <script type="text/javascript" src="./js/window_functions.js"></script> 
    </head>
    <div class="row">
    <a class="col-3"  onclick="goBack()">
      <img id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
    </a>
    </div>
    <?php if (count($templateParams["messaggi"])==0):?>
        <p >La casella di posta è vuota</p>
    <?php else :?>
        <?php foreach($templateParams["messaggi"] as $messaggio):?>
            <?php if (canBeAdded($messaggio)):?>
<p class="text-center"><?php echo $messaggio["data"]?></p>
    <div class="text-center mx-3">
    <article class=" text-center mb-2 ">
        <?php $hour=date_create($messaggio["ora"]); ?>
        <span class="p-2"> <?php echo $messaggio["testo"];?> <a href="<?php echo $messaggio["link"]; ?>">Clicchi qui</a>  <span > per ulteriori dettagli.
           <br> <span class="px-3 d-flex flex-row-reverse "><small><?php echo date_format($hour,"H:i"); ?></small> </span>
    </article> 
    </div>  
  <hr/>
  <?php endif;?>
  <?php endforeach;?>
  <?php endif;?>
  </html>