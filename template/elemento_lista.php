<?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
    <form  action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">
      <button class="btn btn-block col-9 border border-dark mx-5 mb-3 ">
         <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?> x
        <?php echo $ordine["nome_zucca"] ?>
        <?php if($_SESSION["agricoltore"]==1): ?>
            <span class="float-end text-success"> <h6>+<?php echo $prezzo_totale;?>€</h6>
          <?php else: ?>
            <span class="float-end text-danger"> <h6>-<?php echo $prezzo_totale;?>€</h6>
          <?php endif; ?>

      </button> 
    </form> 