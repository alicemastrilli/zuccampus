<ul class="nav nav-tabs nav-justified">
    <li class="nav-item col-6">
      <a <?php isActive("agricoltore_vendite.php");?>class="nav-link" href="agricoltore_vendite.php"><h3>Vendite</h3></a>
    </li>
    <li class="nav-item col-6">
      <a <?php isActive("agricoltore_prodotti.php");?> class="nav-link" href="agricoltore_prodotti.php"><h3>Prodotti</h3></a>
    </li>
  </ul>
  <main>
  <?php
    if(isset($templateParams["main"])){
        require($templateParams["main"]);
    }
    ?>
  
    </main>