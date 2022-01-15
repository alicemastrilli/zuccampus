<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo CSS_DIR?>agricoltore_loggato.css" > 
    </head>
    <ul class="nav nav-tabs nav-justified">
    <li class="nav-item col-6">
      <a class="active  nav-link" href="agricoltore_vendite.php"><h3>Vendite</h3></a>
    </li>
    <li class="nav-item col-6">
      <a class=" <?php isActive("agricoltore_prodotti.php");?> nav-link" href="agricoltore_prodotti.php"><h3>Prodotti</h3></a>
    </li>
  </ul>
  <div class="p-3 text-center" > <h4>Guadagno: <span class="text-success">+<?php echo $templateParams["guadagno"]?>€</span></h4>  </div> </div>
  <canvas class="align-items-center" id="myChart" style="width:100%;max-width:700px"></canvas>
<script src="<?php echo $templateParams["js"]?>"></script> 
  <?php if(isset($templateParams["js"])):?>
    <?php
    $valx = json_encode($templateParams["xV"]);
    $valy = json_encode($templateParams["yV"]);
    echo "<script>prova($valx, $valy)</script>";
?>
  
  <?php endif; ?>
  
  <div class="mx-4 p-3"> <h5>Ultime transazioni:</h5></div>
  <ul class="list-group mx-3 mb-3">
    <?php foreach($templateParams["ordini"] as $ordine):?>
      <?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
    <li class="list-group-item"> <div> <?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?> <br><?php echo $ordine["quantita"]?>
     x <?php echo $ordine["nome_zucca"]?><span class="float-end text-success"> <h6>+<?php echo $prezzo_totale;?>€</h6></div></div> </li>

  <?php endforeach;?>  </ul>
</div>
</html>