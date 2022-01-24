<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo CSS_DIR?>login-form.css" > 
        <script src="https://kit.fontawesome.com/1ecd8bfea6.js" crossorigin="anonymous"></script>
    </head>
<!-- tolto action ="#"-->
<form  method="POST">
    <ul class="list-group text-center">
        <li class="text-center mt-4">
            <label for="username" class="px-3"><h5>Username:</h5></label><input type="text" id="username" name="username" />
        </li>
        <li class=" text-center mt-4">
            <label for="password"  class="px-3"><h5>Password:</h5></label><input type="password" id="password" name="password" />
        </li>
        <li>
            <input class="mt-4" type="submit" name="submit" value="Accedi" />
            </li>
        <li>
            <div class="row d-flex justify-content-center bg-primary col-8 mx-auto mt-4 rounded">
            <i class="fab fa-facebook fa-2x col-3 p-1"></i> <a class="col-9 text-light p-2"  href="">Connettiti con Facebook</a>
            </div>
        </li>
       
        <li>
            <div class="row d-flex justify-content-center bg-primary col-8 mx-auto mt-4 rounded">
           <img class="col-3" src="<?php echo UPLOAD_DIR?>./google.png" alt=""><a class="col-8 text-light p-2 "  href="">Connettiti con Google</a>
            </div>
        </li>
        <span class="my-4">Non hai un account?  <a href="registrati.php">Registrati</a></span>
        </ul>
</form>