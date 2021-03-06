<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" type="text/css" href="./css/header.css" /> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
<nav class="navbar">
    <div class="container ">
        <a class="navbar-brand text-black" href="homepage.php">
            <h1 class="text-dark">Zuccampus</h1>
        </a>
        <div class="float-end">
        <?php if(!isset($_SESSION["agricoltore"]) || $_SESSION["agricoltore"]==0):?>
            <?php if(!isset($_SESSION['product'])){
                        $_SESSION['product']=array();
                    }?>
        <a class="text-decoration-none text-dark" id="carrello" href="carrello.php">
			<span class="notify-badge"><?php echo countShoppingCartProducts($_SESSION['product']) ?></span>
      		<img src="<?php echo UPLOAD_DIR.'carrello.png'?>"  alt="carrello" />
		    </a>
        <?php endif;?>
        <?php if(!isUserLoggedIn()):?>
            <a class="text-decoration-none text-dark"  href="login.php">
      		<img src="<?php echo UPLOAD_DIR.'user.png'?>"  alt="icona login" />
		    </a>
        <?php endif; ?>
            <?php if(isUserLoggedIn() && isset($templateParams["user"])):?>
            <div class="offcanvas offcanvas-end" id="offcanvas">
                <div class="offcanvas-header ">
                    <?php if(!empty($templateParams["user"])): ?>
                        <img class="iconalogin" src="<?php echo UPLOAD_DIR.getImageOfUser($templateParams["user"]["immagine"])?>" alt="foto profilo utente">
                    <?php endif; ?>
                    <h2 class="offcanvas-title p-2"><?php echo $templateParams["user"]["nome"]?> <?php echo $templateParams["user"]["cognome"]?></h2>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
            <div class="offcanvas-body">
                <ul class="list-group">
                <?php foreach(UserWindowFields() as $field):?>
                    <li class="list-group-item text-center">
                        <a class="text-decoration-none text-dark"href="<?php echo $field["href"];?>"><?php echo $field["text"];?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            </div>
            <?php endif;?>
        
        <?php if(isUserLoggedIn()): ?>
            
            <div class="item pe-1">
            <?php
            $_POST["id"] = marksAsRead($templateParams["messaggi"]);
            //json_encode($_POST["id"]);
                ?>
  		    <a id="posta" href="casella_messaggi.php">
			<span class="notify-badge"><?php echo countMessagesUnread($templateParams["messaggi"]) ?></span>
      		<img src="<?php echo UPLOAD_DIR.'posta.jpg'?>"  alt="casella di posta" />
		    </a>
	        </div>
            <img data-bs-toggle="offcanvas" data-bs-target="#offcanvas" 
             src="<?php echo UPLOAD_DIR.getImageOfUser($templateParams["user"]["immagine"])?>" alt="">
        <?php endif; ?>
    </div>
    <script>
            $(document).ready(function(){
                
                $("#posta").click(function(){
                    $("#posta + span").val(0);
                });
            });
    </script>
</nav>
        
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</html>

