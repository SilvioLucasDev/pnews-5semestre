/***************************************/
// VALIDA FORM PÁGINA DE ALTERAÇÃO DE SENHA

$('#btnAlteraSenha').on('click', function () {
    var senha = $('#senha').val();
    var senha2 = $('#senha2').val();
    var senha3 = $('#senha3').val();

    function resInputError(id, tipo) {

        if (tipo === "") {
            $("#"+id).after("<p class='erroInput'>Este campo é obrigatório!</p>");

        } else if (tipo === "senhaError"){
            $("#"+id).after("<p class='erroInput'>As senhas digitadas não conferem!</p>");
        }

        setTimeout(function () {
            $(".erroInput").hide('slow');
        }, 3000);
    }

    // VALIDAR AQUI SE OS CAMPOS ESTÃO PREENCHIDOS
    if (senha == "") {
        resInputError("senha", "");
        return false;

    } else if (senha2 == "", "") {
        resInputError("senha2");
        return false;

    } else if (senha3 == "", "") {
        resInputError("senha3");
        return false;

    } else if (senha2 != senha3) {
        resInputError("senha3", "senhaError");
        return false;
        }

    return true;
});