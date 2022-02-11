<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/agricoltore_loggato.css" > 
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
  
  <div class="mx-4 p-3"> <h4>Ultime transazioni:</h4></div>
  <ul class="list-group mx-3 mb-3 ">
    <?php foreach($templateParams["ordini"] as $ord):?>
      <?php foreach($dbh->getAllComprende($ord["id_ordine"]) as $ordine): ?>
      <?php $prezzo_totale = $ordine["prezzo"] * $ordine["quantita"];?>
      <li class="list-group-item border-dark ">
        <form action="ordine.php?id=<?php echo $ordine["id_ordine"]?>" method="post">
        <div class="ordini">  
          <button class="btn  col-10  "> 
              <span><strong><?php echo $ordine["nome"]?> <?php echo $ordine["cognome"]?></strong><br><?php echo $ordine["quantita"]?>
              x <?php echo $ordine["nome_zucca"]?></span><span class="float-end text-success">+<?php echo $prezzo_totale;?>€</span></div></div> 
            </div>  
          </button>
        </form>
      </li>
    <?php endforeach;?>
  <?php endforeach;?>  </ul>
</div>
</html>