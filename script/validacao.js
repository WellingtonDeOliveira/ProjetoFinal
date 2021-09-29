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
