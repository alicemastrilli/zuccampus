<div class="mx-4 p-3"> <h5>In corso:</h5></div>
  <ul class="list-group mx-3 mb-3">
    <?php foreach($templateParams["ordini"] as $ordine):?>
      <?php if(isInCorso($ordine, $templateParams["info"])):?>
      <?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
    <li class="list-group-item"> 
    <form  action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">  
    <div> <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?>
     x <?php echo $ordine["nome_zucca"]?><span class="float-end text-success"> <h6>+<?php echo $prezzo_totale;?>€</h6></div></div> 
     </form></li>
  <?php endif;?>
  <?php endforeach;?> 
 </ul>
 <div class="mx-4 p-3"><h5>Completati:</h5></div>
 <?php foreach($templateParams["ordini"] as $ordine):?>
    <?php if(!isInCorso($ordine, $templateParams["info"])):?>
    <?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
    <form  action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">
      <button class="btn btn-block col-9 border border-dark mx-5 mb-3 ">
         <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?> x
        <?php echo $ordine["nome_zucca"]?><span class="float-end text-success"> <h6>+<?php echo $prezzo_totale;?>€</h6>
      </button> 
    </form> 
    
    <?php endif;?>
  <?php endforeach;?> 