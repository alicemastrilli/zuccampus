<!DOCTYPE html>
<html lang="it">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />        
        <title><?php echo $templateParams["titolo"]; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css" /> 
        
    </head>
    <body>
    <header class="text-dark">
    <?php
        require($templateParams["header"]);
    ?>
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

    </header>
    <main>
    <?php
       require($templateParams["main"]);
    ?>
    </main>
        <!--copiare da qui (dentro al proprio body)-->
    
 <!--copiare fin qui-->

    <footer class=" rounded-top ">
    <?php
        require($templateParams["footer"]);
    ?>
    </footer>


    </body>
</html>