function goBack() {
    console.log(window.history.back());
    window.history.back();
}

function goBack2times() {
    window.history.go(-2);
}

function goBackShopping() {
    window.location.href = 'prodotti.php';
}