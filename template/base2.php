<!DOCTYPE html>
<html lang="it">
    <head>
        <title><?php echo $templateParams["titolo"]; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/header.css" /> 
        <link rel="stylesheet" type="text/css" href="./css/footer.css" /> 

        <script  src="./js/jquery-3.4.1.min.js"></script> 
        <script  src="./js/window_functions.js"></script> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>
    <body>
  
  
    <?php
       require($templateParams["main"]);
    ?>

        <!--copiare da qui (dentro al proprio body)-->
    
 <!--copiare fin qui-->

   


    </body>
</html>