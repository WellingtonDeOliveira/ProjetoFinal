function validaCampoCadastro(){
    var cpf = document.getElementById("cpf").value;
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    if((cpf == null) || (cpf== "") || (/^\s+$/.test(cpf))){
        alert("Preencha o campo CPF");
        return false;
        
    } else if((nome == null) || (nome== "") || (/^\s+$/.test(nome))){
        alert("Preencha o campo Nome");
        return false;
    } else if((email == null) || (email== "") || (/^\s+$/.test(email))){
        alert("Preencha o campo Email");
        return false;
    } else if((senha == null) || (senha== "") || (/^\s+$/.test(senha))){
        alert("Preencha o campo Senha");
        return false;
    }else if(!TestaCPF(cpf)){
        alert("Cpf Inválido!");
        return false;
    }
    return true;
}
function validaCampoCartao(){
    var nome = document.getElementById("nome").value;
    var numCartao = document.getElementById("numCartao").value;
    var validade = document.getElementById("validade").value;
    var cvv = document.getElementById("cvv").value;
    if((nome == null) || (nome== "") || (/^\s+$/.test(nome))){
        alert("Preencha o campo Nome");
        return false;
    } else if((numCartao == null) || (numCartao== "") || (/^\s+$/.test(numCartao))){
        alert("Preencha o campo Número do cartão");
        return false;
    } else if((validade == null) || (validade== "") || (/^\s+$/.test(validade))){
        alert("Preencha o campo Data de vencimento do cartão");
        return false;
    } else if((cvv == null) || (cvv== "") || (/^\s+$/.test(cvv))){
        alert("Preencha o campo CVV");
        return false;
    }
    return true;
}
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000") return false;

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) return false;
    return true;
}
