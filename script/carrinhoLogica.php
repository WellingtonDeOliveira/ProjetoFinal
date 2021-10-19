<?php
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
?>
