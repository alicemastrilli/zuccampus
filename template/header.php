 <nav class="navbar">
            <div class="container">
                <a class="navbar-brand text-black" href="#">
                        <h1 class="text-dark"><?php echo $templateParams["nome"] ; ?></h1>
                </a>
                <div class="float-end">
                    <?php foreach(getFootersIcons() as $icon):?>
                    <a class="text-decoration-none col-2" href="<?php echo $icon["a"]?>">
                        <img class=" img-fluid ps-1 " src="<?php echo $icon["img"]?>" alt="<?php echo $icon?>" />
                    </a>
                    <?php endforeach;?>
                </div>
                
            </div>
         </nav>          
