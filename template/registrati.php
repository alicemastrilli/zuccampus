<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/registrati.css" /> 

    </head>

    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-0 text-center">
                <img class="img-fluid my-4" src="./icons/icona_login.png" alt="login cliente"/>
                <form action="gestisci_registrazione.php?action=1" method="post">
                    <button class="rounded p-4"  name="cliente">Sono un cliente</button>
                    <input type="hidden" name="cliente" value="cliente" />
                </form>
               
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm-0 text-center">
                <img class="img-fluid my-4" src="./icons/icona_login_agricoltore.png" alt="login agricoltore"/>
                <form action="gestisci_registrazione.php?action=1" method="post">
                <button class="rounded p-4" name="agricoltore">Sono un agricoltore</button>
                <input type="hidden" name="agricoltore" value="agricoltore" />    
            </form>
            </div>
        </div>
    </div>