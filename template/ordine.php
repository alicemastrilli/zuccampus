<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/ordine.css" >  
    </head>
    <section>
    <div class="row">
    <a class="col-3" href="aziende_agricole.php">
      <img src="./icons/freccia.png" alt="freccia indietro">
    </a>
    <div class="col-6 p-3 text-center ">
        <h5><?php echo $templateParams["ordine"]["nome_zucca"];?></h5>
        <h6><?php echo $templateParams["ordine"]["tipo"];?></h6>
        <img src="./icons/zucca_ornamentale.jpg"  
        alt="zucca"/>
    </div>

    <div class="text-center">
      <?php foreach(fillOrders($templateParams["ordine"]) as $x => $x_value ):?>
        <span > <?php echo $x?> </span> <span class="text-secondary"> <?php echo $x_value?></span><br>
        <?php endforeach;?>
        <span> Stato: </span>
        <div class="col-10 pb-2">
            
          <div id ="animate"  style="width: 1px;
          height: 1px;
          position: relative;
          background-color: red;">
              <img src="./icons/fattorino.png" alt="">
          </div>
        </div>
        
        <script src="<?php echo $templateParams["js"]?>"></script> 
  <?php if(isset($templateParams["js"])):?>
    <?php
    //$valx = json_encode($templateParams["xV"]);
    //$valy = json_encode($templateParams["yV"]);
    echo "<script>deliveryAnimation()</script>";

?>
<?php 
endif;?>
    </div>
    </div>
    
      
      <div class="text-center pt-5 mt-5">      
        <div class="progress mx-5  ">
         
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%"></div>
          </div>
    </div>
    <div class="m-5 text-center">

  
    <span >  Consegna prevista: </span> <span class="text-secondary"> Zucca delica</span><br>
        </div>      
        
        
</section>