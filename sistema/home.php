<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<?php
    session_start();
    require_once("../config.php");
    require_once("../function.php");

    $usuario = $_SESSION['usuario'];
    $conn = DbConnect();
    
    print "Olá " . $usuario . ", seja bem-vindo ao sistema!";

    // $query = "SELECT codigo, nome, contato from clie";
    // $result = DbQuery($query, $conn);
    // if (DbNumRows($result) > 0) {
    //     echo "<table border='1'>";
    //     echo "<tr><th>Código</th><th>Nome</th><th>Contato</th></tr>";
    //     while ($row = DbFetchAssoc($result)) {
    //         echo "<tr>";
    //         echo "<td>" . $row['codigo'] . "</td>";
    //         echo "<td>" . $row['nome'] . "</td>";
    //         echo "<td>" . $row['contato'] . "</td>";
    //         echo "</tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "Nenhum cliente encontrado.";
    // }    
?>
<body>
    
</body>
<script>

</script>
</html>