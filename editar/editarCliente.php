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
    <title>Document</title>
</head>

<body>

    <?php
    if ($feedback != false) {
        foreach ($feedback as $value) {
            echo $value;
        }
    }
    ?>

    <form action="validateEditarCliente.php" method="post">
        <input type="hidden" name="editar" value="<?php echo ($indexEditar); ?>">
        <!-- o hidden serve para passar dados de forma "invisível" para que no validateEditarCliente eu consiga receber o index pelo post e assim aterar os dados no bdJson  -->

        <input type="text" placeholder="Nome de usuário" name="name" required
            value="<?php echo $clientesByIndex->name; ?>"><br>
        <input type="text" placeholder="CPF de usuário" name="cpf" required
            value="<?php echo $clientesByIndex->cpf; ?>"> <br>
        <input type="text" placeholder="Endereço de usuário" name="endereco" required
            value="<?php echo $clientesByIndex->endereco; ?>"> <br>
        <input type="date" placeholder="Data de nascimento" name="data"
            value="<?php echo $clientesByIndex->data; ?>"><br>
        <input type="submit" value="Enviar dados"> <br>

    </form>

    <a href="../listar/listarCliente.php">
        <button>Voltar</button>
    </a>
</body>

</html>