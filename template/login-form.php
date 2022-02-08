<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo CSS_DIR?>login-form.css" > 
    </head>
<!-- tolto action ="#"-->
<?php if(isset($templateParams["errorelogin"])):?>
    <div class="alert alert-warning text-center">
  <strong>Attenzione!</strong> <?php echo $templateParams["errorelogin"]?>
</div>
    <?php endif;?>
<form  method="POST">
    <ul class="list-group text-center">
        <li class="text-center mt-4">
            <label for="username" class="px-3">Username:</label><input type="text" id="username" name="username" />
        </li>
        <li class=" text-center mt-4">
            <label for="password"  class="px-3">Password:</label><input type="password" id="password" name="password" />
        </li>
        <li>
            <input class="mt-4" type="submit" name="submit" value="Accedi" />
            </li>
        <li>
            <div class="row d-flex justify-content-center bg-primary col-8 mx-auto mt-4 rounded">
            <img class="col-3" src="<?php echo UPLOAD_DIR?>./facebook.png" alt=""><a class="col-8 text-light p-2 "  href="">Connettiti con Facebook</a>
            </div>
        </li>
       
        <li>
            <div class="row d-flex justify-content-center bg-primary col-8 mx-auto mt-4 rounded">
           <img class="col-3" src="<?php echo UPLOAD_DIR?>./google.png" alt=""><a class="col-8 text-light p-2 "  href="">Connettiti con Google</a>
            </div>
        </li>
    </ul>
    <div class="text-center my-4">
    <span>Non hai un account?  <a href="registrati.php">Registrati</a></span>
</div>
</form>