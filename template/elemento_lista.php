<?php $nome_azienda="";
if($_SESSION["agricoltore"]==1){
  $nome_azienda = $dbh->getAziendaByUsername($_SESSION["username"])[0]["nome_azienda"];
}?>
<?php $prezzo_totale=0;?>
<?php foreach( $dbh->getAllComprende($ordine["id_ordine"]) as $x): ?>
  <?php if($_SESSION["agricoltore"]==0 || $nome_azienda==$x["nome_azienda"]): ?>
<?php $prezzo_totale += $x["prezzo"] * $x["quantita"];?>
<?php endif; ?>
<?php endforeach; ?>
<?php 
$prezzo_totale = $prezzo_totale +2;?>
  <?php if($_SESSION["agricoltore"]==0 && $dbh->isStudente($ordine["username"])):?>
    <?php $prezzo_totale = $prezzo_totale * 80 /100;?>
    <?php endif;?>
    <form  action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">
      <button class="btn btn-block col-9 border border-dark mx-5 mb-3 ">
         <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> 
         <?php foreach( $dbh->getAllComprende($ordine["id_ordine"]) as $x): ?>
          <?php if($nome_azienda==$x["nome_azienda"]): ?>

         <br><?php echo $x["quantita"]?> x
        <?php echo $x["nome_zucca"] ?>
          <?php endif;?> 
        <?php endforeach; ?>
        <?php if($_SESSION["agricoltore"]==1): ?>
            <span class="float-end text-success">+<?php echo $prezzo_totale;?>€ </span>
          <?php else: ?>
            <span class="float-end text-danger">-<?php echo $prezzo_totale;?>€</span>
          <?php endif; ?>
      </button> 
    </form> 