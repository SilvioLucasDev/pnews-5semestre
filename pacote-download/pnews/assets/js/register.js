/***************************************/
// VALIDA FORM PÁGINA DE CADASTRO DE CONTA
$('#btnResgistro').on('click', function () {
    var nome = $('#nome').val();
    var cpf = $('#cpf').val();
    var dt_nascimento = $('#dt_nascimento').val();
    var telefone = $('#telefone').val();
    var email = $('#email').val();
    var senha = $('#senha').val();
    var rua = $('#rua').val();
    var numero = $('#numero').val();
    var bairro = $('#bairro').val();
    var cidade = $('#cidade').val();
    var estado = $('#estado').val();
    var modelo_moto = $('#modelo_moto').val();
    var pneu_utilizado = $('#pneu_utilizado').val();
    var modelo_pneu = $('#modelo_pneu').val();
    var tp_medio_troca = $('#tp_medio_troca').val();

    // VALIDAR AQUI SE OS CAMPOS ESTÃO PREENCHIDOS
    function resInputError(id, tipo) {
        if (tipo === "") {
            $("#"+id).after("<p class='erroInput'>Este campo é obrigatório!</p>");

        } else if (tipo === "qtdLength"){
            $("#"+id).after("<p class='erroInput'>Quantidade de caracteres inválida!</p>");

        }   else if (tipo === "emailError"){
            $("#"+id).after("<p class='erroInput'>Insira um e-mail válido!!</p>");
        }

        setTimeout(function () {
            $(".erroInput").hide('slow');
        }, 4000);
    }

    if (nome == "") {
        resInputError("nome", "");
        return false;

    } else if (cpf == "") {
        resInputError("cpf", "");
        return false;
        
    } else if (cpf.length <= 13) {
        resInputError("cpf", "qtdLength");
        return false;

    } else if (dt_nascimento == "") {
        resInputError("dt_nascimento", "");
        return false;

    } else if (dt_nascimento.length <= 9) {
        resInputError("dt_nascimento", "qtdLength");
        return false;
        
    } else if (telefone == "") {
        resInputError("telefone", "");
        return false;
        
    } else if (telefone.length <= 14) {
        resInputError("telefone", "qtdLength");
        return false;

    } else if (email == "" || email != "") {
        if(email == "") {
            resInputError("email", "");
            return false;
        }
        
        var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if (!regex.test(email)) {
            resInputError("email", "emailError");
            return false;
        } 
    }
    
    if (senha == "") {
        resInputError("senha", "");
        return false;

    } else if (senha.length <= 5) {
        resInputError("senha", "qtdLength");
        return false;
        
    } else if (rua == "") {
        resInputError("rua", "");
        return false;

    } else if (numero == "") {
        resInputError("numero", "");
        return false;
        
    } else if (bairro == "") {
        resInputError("bairro", "");
        return false;

    } else if (cidade == "") {
        resInputError("cidade", "");
        return false;
        
    } else if (estado == "") {
        resInputError("estado", "");
        return false;

    } else if (modelo_moto == "") {
        resInputError("modelo_moto", "");
        return false;
        
    } else if (pneu_utilizado == "") {
        resInputError("pneu_utilizado", "");
        return false;

    } else if (modelo_pneu == "") {
        resInputError("modelo_pneu", "");
        return false;
        
    } else if (tp_medio_troca == "") {
        resInputError("tp_medio_troca", "");
        return false;
    } 

    return true;
});