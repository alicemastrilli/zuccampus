<?php
	session_start();
 
    $newproduct=array(
        'nome' => $_POST["nome_zucca"],
        'peso' => $_POST["peso"],
        'prezzo' => $_POST["prezzo"],
        'quantita' => $_POST["quantity"]
    );
	//check if product is already in the cart
	if(!in_array($newproduct, $_SESSION['product'])){
		array_push($_SESSION['product'], $newproduct);
	}
	else{
	}
 
	header('location: info_prodotti.php');
?>