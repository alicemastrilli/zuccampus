$(document).ready(function(){
  
      azienda_agricola = document.getElementById('nome_azienda');
      azienda_agricolaError = document.querySelector('#nome_azienda + span.error');
      azienda_agricola.addEventListener('input', function (event) {
  
        azienda_agricola.maxLength = 30;
    if (azienda_agricola.value.length >=30) {
      azienda_agricolaError.textContent = 'Il nome azienda non può essere lungo più di 20 caratteri!'; // Reset the content of the message
    } else {
      azienda_agricolaError.textContent ='';
      }
  });


  via = document.getElementById('via');
  viaError = document.querySelector('#via+ span.error');
  if(via != null){
    via.addEventListener('input', function (event) {
    via.maxLength = 20;
    if (via.value.length >=20) {
      viaError.textContent = 'La via non può essere lunga più di 20 caratteri!'; // Reset the content of the message
    } else {
      viaError.textContent ='';
      }
  });
  }
  numero_civico = document.getElementById('numero_civico');
  numero_civicoError = document.querySelector('#numero_civico + span.error');
  if(numero_civico != null){
  numero_civico.addEventListener('input', function (event) {
    numero_civico.maxLength = 3;
    if (numero_civico.value.length >=4) {
      numero_civicoError.textContent = 'Numero civico non valido! Inserire al massimo 3 cifre';
      document.getElementById('submit').disabled = true;

    }
    else {
        document.getElementById('submit').disabled = false;
      numero_civicoError.textContent ='';
      }
  });
}

  citta = document.getElementById('citta');
  cittaError = document.querySelector('#citta + span.error');
  if(citta != null){
  citta.addEventListener('input', function (event) {
    citta.maxLength = 20;
    if (citta.value.length >=20) {
      cittaError.textContent = 'Città non valida! Inserire al massimo 20 caratteri'; // Reset the content of the message
    } else {
      cittaError.textContent ='';
      }
  });
  }
  cap = document.getElementById('cap');
  capError = document.querySelector('#cap + span.error');
  if(cap!=null){
  cap.addEventListener('input', function (event) {
    cap.size = 5;
    if (cap.value.length != 5) {
      document.getElementById('submit').disabled = true;

      capError.textContent = 'Cap non valido! Inserire esattamente 5 cifre'; // Reset the content of the message
    } else {
      capError.textContent ='';
      document.getElementById('submit').disabled = false;

      }
  });
}
});