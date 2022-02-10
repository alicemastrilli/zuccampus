<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="<?php echo CSS_DIR?>agricoltore_loggato.css" > 
  </head>
  <div class="mx-4 pt-3 text-center"> <h2>I miei ordini:</h2></div>
<?php if(isset($templateParams["js"])):?>
<canvas class="align-items-center mt-4" id="myChart" style="width:100%;max-width:700px"></canvas>
<script src="<?php echo $templateParams["js"]?>"></script> 
  
    <?php
    $valx = json_encode($templateParams["xV"]);
    $valy = json_encode($templateParams["yV"]);
    echo "<script>getUserGraph($valx, $valy)</script>";
    ?>  
  <?php endif; ?>

<div class="mx-4 p-3"> <h3>In corso:</h3></div>

    <?php foreach($templateParams["id_ordine"] as $id):?>
     <?php $ordine = $dbh->getOrderById($id)[0];?>
      <?php if(isInCorso($ordine, $templateParams["info"])):?>
        <?php require "elemento_lista.php"?>
  <?php endif;?>
  <?php endforeach;?> 

 <div class="mx-4 p-3"><h3>Completati:</h3></div>
 <?php foreach($templateParams["id_ordine"] as $id):?>
     <?php $ordine = $dbh->getOrderById($id)[0];?>
      <?php if(!isInCorso($ordine, $templateParams["info"])):?>
        <?php require "elemento_lista.php"?>
    
    
    <?php endif;?>
  <?php endforeach;?> 