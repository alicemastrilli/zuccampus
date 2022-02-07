<?php 
$total = 0; 
$costospedizione = 5; 
$sconto = 20;
$isStudente = $templateParams["studente"];
?>
<div class="container-fluid">
    <article>
        <h3>Resoconto ordine:</h3>
        <table class="table table-striped">
            <tbody>
            <?php foreach($_SESSION['product'] as $prodotto): ?>
                <tr>                   
                    <td class="col-9">
                            <p><?php echo $prodotto["nome"]; ?></p>
                            <!--che e' sta roba? a che serve la riga successiva?-->
                            <input type="hidden" name="id" value="<?php echo $prodotto["nome"]; ?>">
                            <p><?php echo $prodotto["tipo"]; ?></p>
                            <p><?php echo $prodotto["nome_azienda"]; ?></p>
                            <input type="hidden" name="nome_azienda" value="<?php echo $prodotto["nome_azienda"]; ?>">
                        <div class="row">
                            <div class="col-6 text-center">
                                <p>Quantità: <?php echo $prodotto["quantita"];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <p>Totale: <?php echo $k=floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]); ?> €</p>
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
            <tr>
                <td >
                    <div class="btn-group text-center mb-2">
                        <form  action="carrello.php" method="post">
                            <button name="paga" class="acquista">Modifica carrello</button>           
                        </form>  
                    </div>
                    <div class="btn-group text-center mb-2">
                        <form  action="./form_pagamento.php" method="post">
                        <?php
                        $_SESSION["acquista"] = 1;
                        ?>
                            <button name="paga" class="acquista">Vai al pagamento</button>           
                        </form>  
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="container mt-2 mb-2 text-center">
        <?php if ($isStudente){
            $total = $total + $costospedizione;
            $total = $total - (($total / 100) * $sconto);
        }else $total = $total + $costospedizione; ?>
        <p>Totale complessivo:<?php echo $total; ?>€</p>
    </div> 