
/***************************************/
//VALIDA FORM PÁGINA DE LOGIN 

$('#btnLogin').on('click', function () {
    var email = $('#email').val();
    var senha = $('#senha').val();

    function resInputError(id) {
        $("#"+id).after("<p class='erroInput'>Este campo é obrigatório!</p>");
        setTimeout(function () {
            $(".erroInput").hide('slow');
        }, 3000);
    }

    if (email == "") {
        resInputError("email");
        return false;

    } else if (senha == "") {
        resInputError("senha");
        return false;
    }

    return true;
});
