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
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="create.css">
</head>

<body id="idbody">
    
    <?php
    if ($feedback != false) {
        foreach ($feedback as $value) {
            echo $value;
        }
    }
    ?>
    <form id="idform" action="validateCreateCliente.php" method="post">
        <h1 id="idh1">Cadastro de cliente</h1>
        
        <input id="txtNome" type="text" placeholder="Nome de cliente" name="name" required><br>
        <input id="txtCpf" type="text" placeholder="CPF de cliente" name="cpf" required> <br>
        <input id="txtEndereco" type="text" placeholder="Endereço de cliente" name="endereco" required> <br>
        <input id="txtData" type="date" placeholder="Data de nascimento" name="data"><br>
        <input id="idSubmit" type="submit" value="Enviar dados"> <br>
    </form>
    <a href="../listar/listarCliente.php">
        <button id="btnVoltar">
            <img id="iconSeta" src="../imagens/iconSeta.png" alt="">
        </button>
    </a>
    <a href="../index.php">
        <button id="btnHome">
            <img id="iconHome" src="../imagens/iconCasa.png" alt="">
        </button>
    </a>
</body>

</html>