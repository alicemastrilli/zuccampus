
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item col-6">
      <a class=" <?php isActive("agricoltore_vendite.php");?> nav-link" href="agricoltore_vendite.php"><h3>Vendite</h3></a>
    </li>
    <li class="nav-item col-6">
      <a class=" <?php isActive("agricoltore_prodotti.php");?> nav-link" href="agricoltore_prodotti.php"><h3>Prodotti</h3></a>
    </li>
  </ul>
  <?php
    if(isset($templateParams["main_agr"])){
        require($templateParams["main_agr"]);
    }
    ?>

    