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
    </header>
        <!--copiare da qui (dentro al proprio body)-->
    
 <!--copiare fin qui-->

    <footer class=" rounded-top ">
        <div class="text-white text-center">
            <p>Zuccampus s.p.a <br> Via dell'Università 50 - 47521 <br> Cesena(FC) <br> <a 
                class="text-white" href="#">zuccampusspa@gmail.com</a> <br>
            </p>
                <img src="./icons/instagram.png" alt="instagram logo"> 
            <a class="text-white text-decoration-none" href="#">@zuccampus</a>
        </div>

    </footer>


    </body>
</html>