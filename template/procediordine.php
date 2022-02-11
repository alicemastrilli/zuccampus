<?php 
$total = 0; 
$costospedizione = 2; 
$sconto = 20;
$isStudente = $templateParams["studente"];
?>
<head>
    <link rel="stylesheet" type="text/css" href="./css/carrello.css" /> 
</head>
<div class="container-fluid">
    <article>
        <h3>Resoconto ordine:</h3>
        <table class="table table-striped">
            <tbody>
                
            <?php foreach($_SESSION['product'] as $prodotto): ?>
                <tr>                   
                    <td class="col-9">
                            <h2><?php echo $prodotto["nome"]; ?></h2>
                            <input type="hidden" name="id" value="<?php echo $prodotto["nome"]; ?>">
                            <p><?php echo $prodotto["tipo"]; ?></p>
                            <p class="azienda"><?php echo $prodotto["nome_azienda"]; ?></p>
                            <input type="hidden" name="nome_azienda" value="<?php echo $prodotto["nome_azienda"]; ?>">
                        <div class="row">
                            <div >
                               
                                <p>Quantità: <?php echo $prodotto["quantita"];?></p>
                            </div>
                        </div>
                        
                            <div class="text-left">
                                <label class="text-left">Totale: <?php echo $k=floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]); ?> €</label>
                            </div>
                        </div>
                    </td>
                    <td class="col-3 p-2">
                        <img class="float-end" src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" width="50%" alt="" />
                        <?php $total=$total+(floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]));?>
                    </td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td class="col-9">
                    <p>Costo di spedizione: <?php echo $costospedizione ?>€</p>
                </td>           
            </tr>
            <?php if ($isStudente): ?>
            <tr>
                <td class="col-9">
                    <p>Sconto studente: <?php echo $sconto?>%</p>
                </td>           
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="container mt-2 mb-2 text-center">
        <?php if ($isStudente){
            $total = $total + $costospedizione;
            $total = $total - (($total / 100) * $sconto);
        }else $total = $total + $costospedizione; ?>
        <label>Totale complessivo: <?php echo $total; ?>€</label>
    </div> 
    <div class="container-right">
        <div class="text-center float-right">
            <form  action="carrello.php" method="post">
                <button name="paga" class="rounded">Modifica carrello</button>           
            </form>  
        </div>
        <div class="text-center float-left">
            <form  action="./form_pagamento.php" method="post">
            <?php
            $_SESSION["acquista"] = 1;
            ?>
                <button name="paga" class="rounded">Vai al pagamento</button>           
            </form>  
        </div>
    </div>