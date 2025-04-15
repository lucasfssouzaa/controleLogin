<?php
session_start();
require_once("function.php");

$msg = "";

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $conn = DbConnect();
    $query = "SELECT login, senha FROM users WHERE login = '$usuario' AND senha = '$senha'";
    $result = DbQuery($query, $conn);

    if (DbNumRows($result) === 1) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['ultima_conexao'] = time();
        header("Location: sistema/home.php");
        exit();
    } else {
        $msg = "Usuário ou senha inválidos.";
    }

    $conn->close();
}

// Mensagem de sessão expirada
if (isset($_GET['msg']) && $_GET['msg'] === "sessao_expirada") {
    $msg = "Sessão expirada. Faça login novamente.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow: hidden;
        font-family: Arial;
    }

    body {
        background-image: url('assets/Bg.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    #login-box { 
        background:rgba(29, 68, 184, 0.3); 
        padding: 20px; 
        border-radius: 10px; 
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        width: 350px;
    }

    form {
        width: 100%;
    }
    
    input { 
        display: block; 
        margin-bottom: 10px; 
        padding: 8px; 
        width: calc(100% - 19.2px);
    }
    
    .error { 
        color: red; 
        margin-bottom: 10px; 
    }

    .input-container {
        position: relative;
        width: 100%;
        margin-bottom: 15px;
    }

    .input-container .material-symbols-outlined {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #aaa;
        pointer-events: none;
    }

    .input {
        width: 100%;
        padding: 10px 10px 10px 40px; /* padding-left maior por causa do ícone */
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
        box-sizing: border-box;
    }

    .input:focus {
        border-color: #1d44b8;
    }

    #login {
        width: 100%;
        color: white;
        background-color: #1d44b8;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        padding: 10px;
    }

    #login:hover {
        background-color: rgb(18, 45, 126);
    }

</style>
<body>
    <div id="login-box">
        <h2 style="width: 100%; text-align: center; color: white">Login</h2>
        <?php if (!empty($msg)) echo "<div class='error'>$msg</div>"; ?>
        <form method="POST" action="">
            <div class="input-container">
                <span class="material-symbols-outlined">person</span>
                <input type="text" class="input" name="usuario" placeholder="Usuário" required>
            </div>
            
            <div class="input-container">
                <span class="material-symbols-outlined">lock</span>
                <input type="password" class="input" name="senha" placeholder="Senha" required>
            </div>
            
            <input type="submit" value="Entrar" id="login">
        </form>
    </div>
</body>
</html>
