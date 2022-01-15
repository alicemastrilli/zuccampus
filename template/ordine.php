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
        <h5>Zucca Piccola</h5>
        <h6>Zucca Commestibile</h6>
        <img src="./icons/zucca_ornamentale.jpg"  
        alt="zucca"/>
    </div>

    <div class="text-center">
        <span > Tipo prodotto: </span> <span class="text-secondary"> Zucca delica</span><br>
        <span> Stato: </span>
        <div class="col-10 pb-2">
            
          <div id ="animate"  style="width: 1px;
          height: 1px;
          position: relative;
          background-color: red;">
              <img src="./icons/fattorino.png" alt="">
          </div>
        </div>
        
        <script>
        
          let id = null;
          const elem = document.getElementById("animate");   
          let pos = 50;
          clearInterval(id);
          id = setInterval(frame, 1);
          function frame() {
            if (pos == 350) {
              clearInterval(id);
            } else {
              pos++; 
              elem.style.left = pos + "px"; 
            }
          }
        
        </script>
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