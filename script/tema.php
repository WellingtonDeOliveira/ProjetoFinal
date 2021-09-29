<?php
session_start();
$acao = $_GET["acao"];

if($acao == "azul"){
    $_SESSION['azul'] = "azul";
    unset($_SESSION['preto']);
    header('Location: ../view/perfilCli.php');
}else if($acao == "preto"){
    $_SESSION['preto'] = "preto";
    unset($_SESSION['azul']);
    header('Location: ../view/perfilCli.php');
}else if($acao == "padrao"){
    unset($_SESSION['azul']);
    unset($_SESSION['preto']);
    header('Location: ../view/perfilCli.php');
}
?>
<script ></script>