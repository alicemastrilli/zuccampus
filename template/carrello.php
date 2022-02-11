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
        if($value!=0){
            if($quantity>intval($massimo)){
                echo '<div class="alert alert-dark">Attenzione! Inserire una quantità valida!</div>';
            }else{
                $_SESSION['product'][$i]["quantita"]=$quantity;
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
    let values=[];
    $.each($("input[name='quantity']"), function(index, item){
        index++;
        $("#salva_modifiche"+index+"").prop( "disabled", true );
        
        values[index] = $(this).val();
        item.max=$("#disponibilita"+index+"").text();
        
        item.addEventListener('input', function (event) {
           

            $("#salva_modifiche"+index+"").prop( "disabled", false );
            $("#procediordine").prop("disabled", true );
            $totale_zucca= $("#totale_zucca"+index+"").text();
            $prezzo_zucca =$("#prezzo"+index+"").val();
            $totale_tutto = $("#totale_tutto").text();
            if($(this).val() > values[index]){
                $tot = parseFloat($totale_zucca)+parseFloat($prezzo_zucca);
                $("#totale_zucca"+index+"").text($tot + " €");
                $tot_tutto = parseFloat($totale_tutto)+parseFloat($prezzo_zucca);
                $("#totale_tutto").text($tot_tutto + " €");
    
            } else{
                $tot = parseFloat($totale_zucca)-parseFloat($prezzo_zucca);
                $("#totale_zucca"+index+"").text($tot + " €");
                $tot_tutto = parseFloat($totale_tutto)-parseFloat($prezzo_zucca);
                $("#totale_tutto").text($tot_tutto + " €");
            }
            values[index] = $(this).val();

        if(item.value==$("#disponibilita"+index+"").text()){
            $("#error"+index+"").text("Hai selezionato la massima quantità di prodotto disponibile");
            
        } else{
            $("#error"+index+"").text("");
        }
        $("#salva_modifiche"+index+"").click(function(){
            $("#procediordine").prop( "disabled", false );

        }) ;
        });
       
    })
  
    
    });
</script>
<div class="container-fluid text-center">
    <h2>Il mio carrello:</h2>
    <hr></hr>
</div>
<?php $total=0;
if(isset($_SESSION["acquista"]) && $_SESSION["acquista"] == 1 && empty($_SESSION['product'])){
        unset($_SESSION["acquista"]);
} ?> 
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
                <?php $total=$total+(floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]));?>

            <?php endforeach;?>
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
                            <input type="hidden" id="prezzo<?php echo $i; ?>" value="<?php echo $prodotto["prezzo"]; ?>">
                            <span class="totale">Totale:</span> <span id="totale_zucca<?php echo $i; ?>"> <?php echo $k=floatval($prodotto["quantita"])*floatval($prodotto["prezzo"]); ?> €</span>
                            
                            <div class="form-group">
                                <label class="quantity-label" for="quantity<?php echo $i; ?>">Quantità:</label>
                                <input type="number" id="quantity<?php echo $i; ?>" name="quantity" class="quantity-input shopping-cart-input"  value="<?php echo $prodotto["quantita"]; ?>" min="1" ><br>
                                <span class="error" id="error<?php echo $i; ?>"></span><br>
                            </div>
                            <input type="submit" id="salva_modifiche<?php echo $i; ?>" name="quantityUpdate" value="Salva le modifiche" class="rounded salva shopping-cart-input">              
                            <input type="submit" name="delete" value="Elimina il prodotto" class="rounded shopping-cart-input" />
                        </form>
                    </td>
                    <td class="col-3 p-2">
                        <img class="float-end" src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" alt="immagine-prodotto" />
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <div class="container mt-2 mb-2 text-center">
            <span>Totale: </span><span id="totale_tutto"> <?php echo $total; ?>€</span>
        </div>       
    </article>
    <div class="row text-center mb-2">
        <div class="col sm-2">
            <button type="button" class="rounded pl-10 py-2" onclick="goBackShopping()">Torna allo shopping</button>
        </div>
        <div class="col sm-6"></div>
        <div class="col sm-2">
            <form  action="<?php if(!isUserLoggedIn()) echo "login.php"; else echo "gestisci_ordine.php"; ?>" method="post">               
             <button name="procediordine" id="procediordine"class="rounded pl-10 py-2">Procedi all'ordine</button>           
            </form>  
        </div>
        
    </div>
</div>
<?php endif; ?>
<script src="./js/window_functions.js"></script>
</html>