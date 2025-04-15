<?php
session_start();

$tempoMaximo = 3600; 

// Caminho base para redirecionar corretamente (ajuste se necessário)
$indexPath = "../index.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
        header("Location: $indexPath");
        exit();
    }
} else {
    // Verifica o tempo de inatividade
    if (time() - $_SESSION['ultima_conexao'] > $tempoMaximo) {
        session_unset();
        session_destroy();
        header("Location: $indexPath?msg=sessao_expirada");
        exit();
    } else {
        // Atualiza o tempo de última conexão
        $_SESSION['ultima_conexao'] = time();
    }
}

// Inclui funções
require_once("function.php");
?>
