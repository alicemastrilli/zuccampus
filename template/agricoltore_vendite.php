<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo CSS_DIR?>agricoltore_loggato.css" > 
    </head>
  
  <div class="p-3 text-center" > <h4>Guadagno: <span class="text-success">+26,50€</span></h4>  </div> </div>
  <canvas class="align-items-center" id="myChart" style="width:100%;max-width:700px"></canvas>
  <?php if(isset($templateParams["js"])):?>
  <script src="<?php echo $templateParams["js"]?>"></script>
  <?php endif; ?>
  <div class="mx-4 p-3"> <h5>Ultime transazioni:</h5></div>
  <ul class="list-group mx-3 mb-3">
    <li class="list-group-item"> <div>Alice Conti <br>2 x zucca piccola<span class="float-end text-success"> <h6>+25,00€</h6></div></div> </li>
    <li class="list-group-item"><div>Elisa Barbeini <br>2 x zucca piccola<span class="float-end text-success"> <h6>+25,00€</h6></div></div></li>
  </ul>
</div>
</html>