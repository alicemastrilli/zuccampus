<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/ordine.css" > 
    </head>
    <section>
    <div class="row">
    <a  onclick="goBack()">
      <img clas="freccia" src="./icons/freccia.png" alt="freccia indietro">
    </a>
    <?php foreach( $dbh->getAllComprende($templateParams["ordine"]["id_ordine"]) as $ord): ?>
      <div class="col-12 text-center">
      <h2><?php echo $ord["nome_zucca"];?></h2>
      </div>
    <div class="col-6 text-center">
      
    <?php foreach(fillOrders($ord, $templateParams["info"], $templateParams["studente"]) as $x => $x_value ):?>
        <span > <?php echo $x?> </span> <span class="text-secondary"> <?php echo $x_value?></span><br>
        <?php endforeach;?>
    </div>
      <div class="col-6 p-3 text-center zucca">        
        
        <img src="./icons/<?php echo $ord["immagine"];?>"
        alt="zucca"/>
    </div>

    <div class="text-center">
      
      </div>
    </div>
      <?php endforeach;?>   

    <div class="col-10 pb-1">        
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
    <div class="m-5 text-center">

  
        </div>      
        
</section>