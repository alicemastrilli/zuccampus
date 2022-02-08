$(document).ready(function(){
  
  
  
      
      $("#matricola, #matricola_label").hide();
      nome = document.getElementById('nome');
      nomeError = document.querySelector('#nome + span.error');
      nome.addEventListener('input', function (event) {
      nome.maxLength = 20;
    if (nome.value.length >=20) {
      nomeError.textContent = 'Il nome non può essere lungo più di 20 caratteri!'; // Reset the content of the message
    } else {
      nomeError.textContent ='';
      }
  });


  cognome = document.getElementById('cognome');
      cognomeError = document.querySelector('#cognome+ span.error');
      cognome.addEventListener('input', function (event) {
      cognome.maxLength = 20;
    if (cognome.value.length >=20) {
      cognomeError.textContent = 'Il cognome non può essere lungo più di 20 caratteri!'; // Reset the content of the message
    } else {
      cognomeError.textContent ='';
      }
  });

  username = document.getElementById('username');
  usernameError = document.querySelector('#username + span.error');
  username.addEventListener('input', function (event) {
    username.maxLength = 20;
    if (username.value.length >=20) {
        usernameError.textContent = 'username non può essere lungo più di 20 caratteri!'; // Reset the content of the message
    } else {
        usernameError.textContent ='';
      }
  });


  password = document.getElementById('password');
  passwordErr = document.querySelector('#password + span.error');
  password.addEventListener('input', function (event) {
    password.maxLength = 15;
    password.minLength = 5;
    if (password.value.length >=15) {
        passwordErr.textContent = 'La password non può essere lungo più di 15 caratteri!'; // Reset the content of the message
    } else if(password.value.length <5){
        passwordErr.textContent = 'La password deve essere lunga almeno 5 caratteri!'; // Reset the content of the message

    } 
    else {
        passwordErr.textContent ='';
      }
  });

  confpassword = document.getElementById('confermapassword');
  confpasswordErr = document.querySelector('#confermapassword + span.error');
  confpassword.addEventListener('input', function (event) {
   
    if (confpassword.value != password.value) {
        document.getElementById('submit').disabled = true;

        confpasswordErr.textContent = 'Le due password devono coincidere'; // Reset the content of the message
    }
    else {
        document.getElementById('submit').disabled = false;

        confpasswordErr.textContent ='';
      }
  });

  num_telefono = document.getElementById('numeroditelefono');
  num_telefonoErr = document.querySelector('#numeroditelefono + span.error');
  num_telefono.addEventListener('input', function (event) {
    num_telefono.size = 10;
   
    if (num_telefono.value.length != 10) {
        num_telefonoErr.textContent = 'Numero di telefono non valido!'; // Reset the content of the message
    } else {
        num_telefonoErr.textContent = ''; // Reset the content of the message

    } 
    
  });

  matr = document.getElementById('matricola');
  matrErr = document.querySelector('#matricola + span.error');
  matr.addEventListener('input', function (event) {
    matr.size = 10;
   
    if (matr.value.length != 10) {
        matrErr.textContent = 'Numero di matricola non valida!'; // Reset the content of the message
    } else {
        matrErr.textContent = ''; // Reset the content of the message

    } 
    
  });
    })
     