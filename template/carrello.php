    <head>
        <link rel="stylesheet" type="text/css" href="./css/carrello.css" /> 
    </head>
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-0 text-center">
                <h3 class="px-2">Il mio carrello</h3>
            </div> 
        </div>

        <!--se il carrello e' vuoto-->
        <div class="row">
            <div class="col-sm-0 mb-3 text-center">
                <p>Il carrello è vuoto</p>
                <a class="btn btn-primary" href="<?php echo $templateParams["prodotti"]?>" role="button">Continua con gli acquisti</a>
            </div> 
        </div>

        <!--se il carrello ha almeno un elemento-->
        <div class="row">
            <div class="col">    
                <h5>Zucca Delica</h5>
                <p>Azienda agricola</p>
                <div class="my-2 btn-group">
                    <button type="button" class="btn btn-primary">-</button>
                            <input class="text-center" type='text' size='1' name='item' value='0'/>
                    <button type="button" class="btn btn-primary">+</button>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <img class="img-fluid my-4" src="./icons/zuccaDelica.png" alt=""/>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class = "col-sm-0">
                <p>Totale: </p>
            </div>
        </div> 
        <div class="row m-2">
            <div class = "col-sm-0">
            <p class="m-2">Ritiro presso Campus di Cesena - Via dell'Universita' 50<br>Arrivo previsto entro 24h</p>
            </div>   
        </div>
        <div class="row text-center">
            <div class="mb-3">
            <a class="btn btn-primary" href="<?php echo $templateParams["acquista"]?>" role="button">Acquista</a>
            </div>


        </div>

        
        <button class="open-button" onclick="openForm()">Open Form</button>

    <div class="form-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        <h1>Login</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

       <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit" class="btn">Login</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

    </div>
         
  