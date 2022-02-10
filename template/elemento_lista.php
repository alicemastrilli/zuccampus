<?php $nome_azienda="";
if($_SESSION["agricoltore"]==1){
  $nome_azienda = $dbh->getAziendaByUsername($_SESSION["username"])[0]["nome_azienda"];
}
$prezzo_totale=0;
foreach( $dbh->getAllComprende($ordine["id_ordine"]) as $x){
  if($_SESSION["agricoltore"]==0 || $nome_azienda==$x["nome_azienda"]){
    $prezzo_totale += $x["prezzo"] * $x["quantita"];
  }
}

$prezzo_totale = $prezzo_totale +2;
if($_SESSION["agricoltore"]==0 && $dbh->isStudente($ordine["username"])){
  $prezzo_totale = $prezzo_totale * 80 /100;
}?>
<form action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">
  <button class="ordini btn btn-block col-9 border border-dark mx-5 mb-3 ">
    <?php echo $ordine["nome"]; echo " "; echo $ordine["cognome"];
    foreach( $dbh->getAllComprende($ordine["id_ordine"]) as $x):
      if($nome_azienda==$x["nome_azienda"]): ?>
        <br><?php echo $x["quantita"]?> x
        <?php echo $x["nome_zucca"];
      endif;
    endforeach; 
    if($_SESSION["agricoltore"]==1): ?>
        <span class="float-end text-success">+<?php echo $prezzo_totale;?>€ </span>
      <?php else: ?>
        <span class="float-end text-danger">-<?php echo $prezzo_totale;?>€</span>
    <?php endif; ?>
  </button> 
</form> 