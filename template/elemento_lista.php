<?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"] +2;?>
  <?php if($dbh->isStudente($ordine["username"])):?>
    <?php $prezzo_totale = $prezzo_totale * 80 /100;?>
    <?php endif;?>
    <form  action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">
      <button class="btn btn-block col-9 border border-dark mx-5 mb-3 ">
         <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?> x
        <?php echo $ordine["nome_zucca"] ?>
        <?php if($_SESSION["agricoltore"]==1): ?>
            <span class="float-end text-success"> <span>+<?php echo $prezzo_totale;?>€
          <?php else: ?>
            <span class="float-end text-danger"> <span>-<?php echo $prezzo_totale;?>€
          <?php endif; ?>

      </button> 
    </form> 