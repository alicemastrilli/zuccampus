<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="./css/ordine.css" > 
  </head>
  <section>
    <div class="row">
      <?php if(!isset($_POST["ordine_effettuato"])):?>
      <a  onclick="goBack()">
      <img  src="./icons/freccia.png" alt="freccia indietro">
      </a>
      <?php endif;?>
      <?php foreach( $dbh->getAllComprende($templateParams["ordine"]["id_ordine"]) as $ord): ?>
        <div class="col-12 mb-4 text-center">
          <h2><?php echo $ord["nome_zucca"];?></h2>
        </div>
        <div class="col-7 text-center">
          <?php foreach(fillOrders($ord, $templateParams["info"], $templateParams["studente"]) as $x => $x_value ):?>
              <span > <?php echo $x?> </span> <span class="text-secondary"> <?php echo $x_value?></span><br>
          <?php endforeach;?>
        </div>
        <div class="col-5 p-3 text-center zucca">        
          <img src="./icons/<?php echo $ord["immagine"];?>"
        alt="zucca"/>
        </div>  
      <?php endforeach;?>   
    </div>
    <div class="col-10 pb-10 mb-10">        
      <div id ="animate"  style="width: 1px;
      height: 1px;
      position: relative;
      background-color: white;">
          <img src="./icons/fattorino.png" alt="">
      </div>
      <?php $width = computeDeliveryStatus($templateParams["ordine"], $templateParams["info"])[1];?>
        <script 
        src="<?php echo $templateParams["js"]?>"></script> 
      <?php if(isset($templateParams["js"])):?>
      <?php echo "<script>deliveryAnimation($width)</script>";?>
      <?php endif;?>
      <div class="text-center pt-5 mt-4">      
        <div class="progress mx-5  ">
            <div id ="bar" class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?php echo $width."%"?>"></div>
        </div>
      </div>   
    </div>
    <div class="container-left mb-5 mt-5 text-center">
        <button type="button" class="rounded" onclick="goBackShopping()">Torna allo shopping</button>
    </div>
    <div class="m-2 text-center">
    </div> 
  </section>