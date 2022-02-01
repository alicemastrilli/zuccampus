<?php
require_once 'bootstrap.php'; 
if (isset($_POST['submit'])) {
    $i=0;
    $id=$_POST["id"];
    $nome_azienda=$_POST["nome_azienda"];
    foreach($_SESSION['product'] as $key){
        $value=0;
        if($key["id"]==$id){
            if($key["nome_azienda"]==$nome_azienda){
                $quantity=$_POST["quantity"];
                var_dump($quantity);
                $value=$value+1;
            }
        }
        if($value!=0){
            $_SESSION['product'][$i]["quantita"]=$quantity;
        }
        $i++;
    }
}else { 
    $quantity = 1;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Shopping Cart using Session in PHP</title>
	<link rel="stylesheet" type="text/css" href="./css/prodotti.css">
</head>
<div class="container-fluid">
    <h1>Il mio carrello:</h1>
    <hr></hr>
</div>
<?php $total=0; ?>
<?php if(empty($_SESSION['product'])): ?>
<div class="container-fluid mt-1">
    <p>Il carrello è vuoto<p>
</div>
<?php else: ?>
<div class="container-fluid">
    <article>
        <table class="table table-striped">
            <tbody>
            <?php foreach($_SESSION['product'] as $prodotto): ?>
                <tr>                   
                    <td class="col-9">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <p><?php echo $prodotto["id"]; ?></p>
                            <input type="hidden" name="id" value="<?php echo $prodotto["id"]; ?>">
                            <p><?php echo $prodotto["tipo"]; ?></p>
                            <p><?php echo $prodotto["nome_azienda"]; ?></p>
                            <input type="hidden" name="nome_azienda" value="<?php echo $prodotto["nome_azienda"]; ?>">
                        </form>
                        <div class="row">
                            <div class="col-6 text-center ">
                                <button class="visualize mb-2" type="button">Elimina il Prodotto</button>                   
                            </div>
                            <div class="col-6 text-center">
                                <form action="#" method="post">
                                    <input type="number" id="quantity" name="quantity" value="<?php echo $prodotto["quantita"]; ?>" ><br><br>
                                    <input type="submit" name="submit" class="btn btn-primary btn-sm">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="col-3 p-2">
                        <img class="float-end" src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" width="50%" alt="" />
                        <p>Totale: <?php echo $k=floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]); ?> €</p>
                        <?php $total=$total+(floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]));?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <div class="container mt-2 mb-2 text-center">
            <p>Sub-totale:<?php echo $total; ?>€</p>
        </div>       
    </article>
    <div class="btn-group text-center mb-2">
        <button type="button" class="acquista" onclick="goBackShopping()">Torna allo shopping</button>
    </div>
    <div class="btn-group text-center mb-2">
        <button type="button" class="acquista">Procedi all'ordine</button>
    </div>
</div>
<?php endif; ?>
<script src="./js/window_functions.js"></script>
</html>