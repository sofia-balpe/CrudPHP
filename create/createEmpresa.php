<?php
session_start();

$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if ($feedback != false) {
        foreach ($feedback as $value) {
            echo $value;
        }
    } else {
        echo 'Empresa cadastrada com sucesso';
    }

    ?>

    <form action="validateEmpresa.php" method="post">
        <input type="text" placeholder="nome da empresa" name="nomeFantasia">
        <input type="text" placeholder="razao social" name="razaoSocial">
        <input type="text" placeholder="CNPJ" name="cnpj">
        <input type="submit" value="Enviar">

    </form>
    <a href="../listar/listarEmpresas.php">
        <button> Listar</button>
    </a>
</body>

</html>