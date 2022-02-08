$(document).ready(function(){
      nome = document.getElementById('nome');
      nomeError = document.querySelector('#nome + span.error');
      nome.addEventListener('input', function (event) {
      nome.maxLength = 10;
    if (nome.value.length >=10) {
      nomeError.textContent = 'Il nome non può essere lungo più di 10 caratteri!'; // Reset the content of the message
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

  num_carta = document.getElementById('numero_carta');
  num_cartaError = document.querySelector('#numero_carta + span.error');
  num_carta.addEventListener('input', function (event) {
    num_carta.size = 16;
    num_carta.maxLength=16;
    if (num_carta.value.length !=16) {
      num_cartaError.textContent = 'Carta di credito non valida! Inserire 16 cifre '; 
      document.getElementById('btn').disabled = true;
    } else {
      num_cartaError.textContent ='';
      document.getElementById('btn').disabled = false;

      }
  });

  cvv = document.getElementById('cvv');
  cvvError = document.querySelector('#cvv + span.error');
  cvv.addEventListener('input', function (event) {
    cvv.size = 3;
    cvv.maxLength =3;
    if (cvv.value.length !=3) {
      document.getElementById('btn').disabled = true;

      cvvError.textContent = 'Cvv non valido! Inserire 3 cifre '; // Reset the content of the message
    } else {
      document.getElementById('btn').disabled = false;

      cvvError.textContent ='';
      }
  });

 


  
    })
     