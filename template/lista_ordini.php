<div class="mx-4 p-3"> <h5>In corso:</h5></div>

    <?php foreach($templateParams["ordini"] as $ordine):?>
      <?php if(isInCorso($ordine, $templateParams["info"])):?>
        <?php require "elemento_lista.php"?>
  <?php endif;?>
  <?php endforeach;?> 

 <div class="mx-4 p-3"><h5>Completati:</h5></div>
 <?php foreach($templateParams["ordini"] as $ordine):?>
    <?php if(!isInCorso($ordine, $templateParams["info"])):?>
    <?php require "elemento_lista.php"?>
    
    
    <?php endif;?>
  <?php endforeach;?> 