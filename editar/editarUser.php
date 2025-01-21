<?php
session_start();

include("../database.php");
use App\banco;
$banco = new banco();

$feedback = $_SESSION['feedback'] ?? false;
unset($_SESSION['feedback']);

$indexEditar = $_GET['editar'];

if ($banco->validarIndexUser($indexEditar) == false) {
    $_SESSION['erro'] = "índice não existe";
    header('location: editarUser.php');
    exit();
}
$usersByIndex = $banco->getUsersByIndex($indexEditar);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Usuários</title>
    <link rel="stylesheet" href="editar.css">
</head>

<body id="idBody">

    <h1 id="idh1"> Editar Usuários</h1>
    <hr>
    <?php
    if ($feedback != false) {
        foreach ($feedback as $value) {
            echo $value;
        }
    }

    ?>

    <form id="idForm" action="validateEditarUser.php" method="post">
        <input type="hidden" name="editarUser" value="<?php echo ($indexEditar); ?>">

        <input id="txtNome" type="text" placeholder="Nome de usuário" name="name" required
            value="<?php echo $usersByIndex->name; ?>"><br>
        <input id="txtCpf" type="text" placeholder="CPF de usuário" name="cpf" required value="<?php echo $usersByIndex->cpf; ?>">
        <br>
        <input id="txtEmail" type="email" placeholder="Email de usuário" name="email" required
            value="<?php echo $usersByIndex->email; ?>"> <br>
        <input id="txtData" type="date" placeholder="Data de nascimento" name="data" value="<?php echo $usersByIndex->data; ?>"><br>
        <input id="idSubmit" type="submit" value="Enviar dados"> <br>

    </form>
    
    <a href="../index.php">
        <button id="btnHome">
            <img id="iconHome" src="../imagens/iconCasa.png" alt="">
        </button>
    </a>

    <a href="../listar/listarUsers.php">
        <button id="btnVoltar"><img id="iconSeta" src="../imagens/iconSeta.png" alt=""></button>
    </a>
</body>

</html>