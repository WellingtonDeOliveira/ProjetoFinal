<?php
require_once '../model/comida.php';
session_start();
if (isset($_GET['adicionar'])) {
    $idComida = (int) $_GET['adicionar'];
    if (isset($_SESSION['carrinho'][$idComida])) {
        $_SESSION['carrinho'][$idComida]['quantidade']++;
        header('location: ../controller/controleComida.php?acao=redirecionar');
    }
}

if (isset($_GET['decrementar'])) {
    $idComida = (int) $_GET['decrementar'];
    if (isset($_SESSION['carrinho'][$idComida])) {
        if ($_SESSION['carrinho'][$idComida]['quantidade'] == 1) {
            unset($_SESSION['carrinho'][$idComida]);
            header('location: ../controller/controleComida.php?acao=redirecionar');
        } else {
            $_SESSION['carrinho'][$idComida]['quantidade']--;
            header('location: ../controller/controleComida.php?acao=redirecionar');
        }
    }
}
$comida = $_SESSION["comidad"];
if(isset($_GET['adicionarPlus'])){
  // Adicionando ao carrinho
  $idComida = (int) $_GET['adicionarPlus'];
    if(isset($_SESSION['carrinho'][$idComida])){
      $_SESSION['carrinho'][$idComida]['quantidade']++;
      header('location: ../index.php');
    }else{
      $_SESSION['carrinho'][$idComida] = array('quantidade'=>1,'nome'=>$comida->getNome(),
       'valor'=>$comida->getValor(), 'id'=>$comida->getIdComida());
       header('location: ../index.php');
    }
}
?>
