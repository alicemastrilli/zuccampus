<div class="mx-4 p-3"> <h5>Ultime transazioni:</h5></div>
  <ul class="list-group mx-3 mb-3">
    <?php foreach($templateParams["ordini"] as $ordine):?>
      <?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
    <li class="list-group-item"> <div> <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?>
     x <?php echo $ordine["nome_zucca"]?><span class="float-end text-success"> <h6>+<?php echo $prezzo_totale;?>€</h6></div></div> </li>

  <?php endforeach;?>  </ul>
  <div class="mx-4 p-3"> <h5>Ultime transazioni:</h5></div>
  <ul class="list-group mx-3 mb-3">
    <?php foreach($templateParams["ordini"] as $ordine):?>
      <?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
    <li class="list-group-item"> <div> <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?>
     x <?php echo $ordine["nome_zucca"]?><span class="float-end text-success"> <h6>+<?php echo $prezzo_totale;?>€</h6></div></div> </li>

  <?php endforeach;?>  </ul>