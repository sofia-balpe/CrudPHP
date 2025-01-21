<?php
session_start();

include("../database.php");
use App\banco;
$banco = new banco();

$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

$indexEditar = $_GET['editar'];

if ($banco->validarIndexCliente($indexEditar) == false) {
    $_SESSION['erro'] = "índice não existe";
    header('location: editarCliente.php');
    exit();
}

$clientesByIndex = $banco->getClienteByIndex($indexEditar);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="editar.css">
</head>

<body id="idBody">

    <?php
    if ($feedback != false) {
        foreach ($feedback as $value) {
            echo $value;
        }
    }
    ?>
    <h1 id="idh1">Editar Cliente</h1>
    <hr>
    <form id="idForm" action="validateEditarCliente.php" method="post">
        <input type="hidden" name="editar" value="<?php echo ($indexEditar); ?>">
        <!-- o hidden serve para passar dados de forma "invisível" para que no validateEditarCliente eu consiga receber o index pelo post e assim aterar os dados no bdJson  -->

        <input id="txtNome" type="text" placeholder="Nome de cliente" name="name" required
            value="<?php echo $clientesByIndex->name; ?>"><br>
        <input id="txtCpf" type="text" placeholder="CPF de cliente" name="cpf" required
            value="<?php echo $clientesByIndex->cpf; ?>"> <br>
        <input id="txtEndereco" type="text" placeholder="Endereço de cliente" name="endereco" required
            value="<?php echo $clientesByIndex->endereco; ?>"> <br>
        <input id="txtData" type="date" placeholder="Data de nascimento" name="data"
            value="<?php echo $clientesByIndex->data; ?>"><br>
        <input  id="idSubmit" type="submit" value="Enviar dados"> <br>

    </form>
    <a href="../index.php">
        <button id="btnHome">
            <img id="iconHome" src="../imagens/iconCasa.png" alt="">
        </button>
    </a>

    <a href="../listar/listarCliente.php">
        <button id="btnVoltar"><img id="iconSeta" src="../imagens/iconSeta.png" alt=""></button>
    </a>
</body>

</html>