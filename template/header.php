<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/header.css" /> 
</head>
<body>
<nav class="navbar">
    <div class="container ">
        <a class="navbar-brand text-black" href="#">
            <h1 class="text-dark"><?php echo $templateParams["nome"] ; ?></h1>
        </a>
        <div class="float-end">
            <?php foreach(getFootersIcons() as $icon):?>
                <a class="text-decoration-none col-2" href="<?php echo $icon["a"]?>">
                    <img class=" img-fluid ps-1 " src="<?php echo $icon["img"]?>" alt="<?php echo $icon["img"]?>" />
                </a>
            <?php endforeach;?>
            <div class="offcanvas offcanvas-end" id="offcanvas">
                <div class="offcanvas-header ">
                    <img src="<?php echo UPLOAD_DIR.$templateParams["user"]["immagine"] ?>" alt="">
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
        
        <?php if(isUserLoggedIn()): ?>
            
            <div class="item pe-1">
  		    <a href="casella_messaggi.php">
			<span class="notify-badge"><?php echo countMessagesUnread($templateParams["messaggi"]) ?></span>
      		<img src="<?php echo UPLOAD_DIR.'posta.jpg'?>"  alt="casella di posta" />
		    </a>
	        </div>
            <?php
            if ($templateParams["user"]["immagine"] == ""){
                $img_profile = "utente_generico.jpg";
            } else{
                $img_profile = $templateParams["user"]["immagine"];
            }

            ?>
            <img class="ps-2"data-bs-toggle="offcanvas" data-bs-target="#offcanvas"  src="<?php echo UPLOAD_DIR.$img_profile ?>" alt="">
        <?php endif; ?>
    </div>
</nav>
        


