<?php
// Variáveis de conexão com o banco de dados
$host = "localhost";
$dbName = "meuSistema";
$user = "root";
$password = "2001";

// Função para conectar ao banco de dados
function DbConnect() {
    global $host, $dbName, $user, $password;
    $conn = new mysqli($host, $user, $password, $dbName);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    return $conn;
}

// Executa uma query e retorna o resultado
function DbQuery($query, $conn) {
    return $conn->query($query);
}

// Retorna número de linhas da última query
function DbNumRows($result) {
    return $result->num_rows;
}

// Retorna número de linhas afetadas pela última operação
function DbRowsAffected($conn) {
    return $conn->affected_rows;
}

// Retorna uma linha como array associativo
function DbFetchAssoc($result) {
    return $result->fetch_assoc();
}
?>
