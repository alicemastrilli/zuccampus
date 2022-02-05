$(document).ready(function() {
    $("#form").validate({
        rules : {
            nome : {
              required : true
            },
            cognome : {
                required : true,
            },
            username : {
                required : true,
            },

            password : {
                required : true,
                minlength : 5,
                maxlength : 8
            },
            email: {
                required : true,
                email : true,
            },
            num_telefono : {
                required : true,
                maxlength : 14,
                digits : true,
            },
        },
        messages: {
            nome: "Inserisci il tuo nome",
            cognome: "Inserisci il tuo cognome",
            username: "Inserisci uno username",
            password: {
                required: "Inserisci una password",
                minlength: "La password deve essere lunga minimo 5 caratteri",
                maxlength: "La password deve essere lunga al massimo 15 caratteri"
            },
            email: "Inserisci la tua email",
            num_telefono: "Inserisci il tuo numero di telefono"
        },
        // Settiamo il submit handler per la form
        submitHandler: function(form) {
            form.submit();
        }
    });
});