<?php

session_start();
require_once("../model/comida.php");
require_once("../model/comidaDAO.php");

$acao = $_GET["acao"];
$comidaDAO = new ComidaDAO();

if($acao == "cadastrar"){
    $arquivo = $_FILES['imagem']['name'];
    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
    $novo_nome = md5(time()).".".$extensao;
    $diretorio = "../assets/comidas/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

    $imagem = $novo_nome;
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
    $nome = $_POST["nome"];
    $res = true;
    $comida = new Comida();
    $comida->setImagem($imagem);
    $comida->setDescricao($descricao);
    $comida->setValor($valor);
    $comida->setCategoria($categoria);
    $comida->setNome($nome);
    $comidaDAO->inserir($comida);
    header('Location: ../view/gerenciamento.php');
}else if($acao == "listar"){
    $_SESSION["comidas"] = $comidaDAO->recuperarTodos();
    header('Location: ../index.php');
}else if($acao == "listarADM"){
    $_SESSION["comidas"] = $comidaDAO->recuperarTodos();
    header('Location: ../view/controleComida.php');
}else if($acao == "excluir"){
    $id_comida = $_GET["id_comida"];
    $comida = new Comida();
    $comida->setIdComida($id_comida);
    $comidaDAO->excluir($comida);
    header('Location: ../controller/controleComida.php?acao=listarADM');
}else if($acao == "recuperar"){
    $nome = $_GET["nome"];
    $comida = $comidaDAO->recuperarPorNome($nome);
    $_SESSION["comida"] = $comida;

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "recuperarPorId"){
    $id_comida = $_GET["id_comida"];
    $comida = $comidaDAO->recuperarPorId($id_comida);
    $_SESSION["comidad"] = $comida;
    header('Location: ../view/detalhePedido.php');
}else if($acao == "recuperarEditar"){
    $id_comida = $_GET["id_comida"];
    $comida = $comidaDAO->recuperarPorId($id_comida);
    $_SESSION["comidad"] = $comida;
    header('Location: ../view/editarComida.php');
}else if($acao == "atualizar"){
    if($_FILES['imagem']['name'] == "" || $_FILES['imagem']['name'] == null){
        $imagem = $_POST['img'];
    }else{
    $arquivo = $_FILES['imagem']['name'];
    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
    $novo_nome = md5(time()).".".$extensao;
    $diretorio = "../assets/comidas/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
    $imagem = $novo_nome;
    }
    $id_comida = $_POST['id_comida'];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
    $nome = $_POST["nome"];
    $comida = new Comida();
    $comida->setImagem($imagem);
    $comida->setIdComida($id_comida);
    $comida->setDescricao($descricao);
    $comida->setValor($valor);
    $comida->setCategoria($categoria);
    $comida->setNome($nome);
    $comidaDAO->atualizar($comida);
    header('Location: ../view/gerenciamento.php');
}
?>