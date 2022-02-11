
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item col-6">
      <a class=" <?php isActive("agricoltore_vendite.php");?> nav-link" href="agricoltore_vendite.php"><h2>Vendite</h2></a>
    </li>
    <li class="nav-item col-6">
      <a class=" <?php isActive("agricoltore_prodotti.php");?> nav-link" href="agricoltore_prodotti.php"><h2>Prodotti</h2></a>
    </li>
  </ul>
  <?php
    if(isset($templateParams["main_agr"])){
        require($templateParams["main_agr"]);
    }
    ?>

    