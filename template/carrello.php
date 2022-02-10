<?php
require_once 'bootstrap.php'; 
if(isset($_POST['quantityUpdate'])) {
    $newproduct=array(
        'nome' => $_POST["nome"],
        'nome_azienda' => $_POST["nome_azienda"]
    );
    $massimo=$dbh -> getProductByFarmerAndName($newproduct["nome_azienda"], $newproduct["nome"])[0]["disponibilita"];
    $i=0;
    foreach($_SESSION['product'] as $key){
        $value=0;
        if($key["nome"]==$newproduct["nome"]){
            if($key["nome_azienda"]==$newproduct["nome_azienda"]){
                $quantity=$_POST["quantity"];
                $value=$value+1;
            }
        }
        
        $i++;
    }
}else { 
    $quantity = 1;
} 

if(isset($_POST['delete'])){
    $newproduct=array(
        'nome' => $_POST["nome"],
        'nome_azienda' => $_POST["nome_azienda"]
    );
    $i=0;
    $products=array();
    foreach($_SESSION['product'] as $key){
        if($key["nome"]==$newproduct["nome"]){
            if($key["nome_azienda"]==$newproduct["nome_azienda"]){
                $_SESSION['product'][$i];
                unset($_SESSION['product'][$i]);
                echo '<script type="text/JavaScript">location.reload();</script>';
            }
        }else{
            array_push($products,$_SESSION['product'][$i]);
        }
        $i++;
    }
    unset($_SESSION['product']);
    $_SESSION['product']=$products;
    unset($products);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/carrello.css" /> 
</head>
<script>
    $(document).ready(function(){
    $.each($("input[name='quantity']"), function(index, item){
        console.log(item);

        item.min="1";

        index++;
        console.log(index);
        console.log($("#disponibilita"+index+"").text());
        $disponibilita = $("#disponibilita"+index+"").text();
        item.max=$disponibilita;
        console.log(item.max);
        item.addEventListener('input', function (event) {
            console.log( $("span.error:nth-of-type("+index+")").text(""));
            
        if(item.value==$disponibilita){
           
            $("#error"+index+"").text("Hai selezionato la massima quantià di prodotto disponibile");

        } else{
            $("#error"+index+"").text("");
        }
            
        });
    })
  
    
    });
</script>
<div class="container-fluid text-center">
    <h2>Il mio carrello:</h2>
    <hr></hr>
</div>
<?php $total=0; ?>
<?php if(empty($_SESSION['product'])): ?>
<div class="container-fluid mt-1 text-center">
    <p>Il carrello è vuoto<p>
</div>
<div class="container-left mb-2 mt-2 text-center">
    <button type="button" class="rounded" onclick="goBackShopping()">Torna allo shopping</button>
</div>
<?php else: ?>
<div class="container-fluid">
    <article aria-label="article">
        <table class="table table-striped">
            <tbody>
            <?php $i=0; ?>
            <?php foreach($_SESSION['product'] as $prodotto): ?>
                <?php $disponibilita = $dbh->getDisponibilita($prodotto["nome"], $prodotto["nome_azienda"])[0]["disponibilita"];?>
                <tr class="container-product">                   
                    <td class="col-9">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <?php $i=$i+1; ?>
                       
                            <h2><?php echo $prodotto["nome"]; ?></h2>
                            <input type="hidden" name="nome" value="<?php echo $prodotto["nome"]; ?>">
                            <p><?php echo $prodotto["tipo"]; ?></p>
                            <p>Disponibilità:  <span id="disponibilita<?php echo $i; ?>"><?php echo $disponibilita;?></span> </p>
                            <p class="azienda"><?php echo $prodotto["nome_azienda"]; ?></p>
                            <input type="hidden" name="nome_azienda" value="<?php echo $prodotto["nome_azienda"]; ?>">
             
                            <p>Totale: <?php echo $k=floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]); ?> €</p>
                            <?php $total=$total+(floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]));?>
                            <div class="row">
                                <div class="col-6 text-center mt-3">
                                    <input type="submit" name="delete" value="Elimina il prodotto" class="rounded" />                  
                                </div>
                                <div class="col-6 text-center mt-2">
                                    <label for="quantity<?php echo $i; ?>">Quantità:</label>
                                   
                                    <input type="number" id="quantity<?php echo $i; ?>" name="quantity" class="quantity-input"  value="<?php echo $prodotto["quantita"]; ?>" min="1" ><br>
                                    <span class="error" id="error<?php echo $i; ?>"></span><br>
                                    <input class="mt-2" type="submit" id="salva_modifiche" name="quantityUpdate" value="Salva le modifiche" class="rounded salva">
                                </div>
                            </div>
                        </form>
                    </td>
                    <td class="col-3 p-2">
                        <img class="float-end" src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" width="150" alt="" />
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <div class="container mt-2 mb-2 text-center">
            <p>Totale:<?php echo $total; ?>€</p>
        </div>       
    </article>
    <div class="text-center">
    <div class="text-center">
            <button type="button" class="rounded" onclick="goBackShopping()">Torna allo shopping</button>
        </div>
        <div class="text-center">
            <form  action="<?php if(!isUserLoggedIn()) echo "login.php"; else echo "gestisci_ordine.php"; ?>" method="post">               
             <button name="procediordine" class="rounded">Procedi all'ordine</button>           
            </form>  
        </div>
    </div>
</div>
<?php endif; ?>
<script src="./js/window_functions.js"></script>
</html>