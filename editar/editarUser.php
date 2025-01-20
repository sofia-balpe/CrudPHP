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
</head>

<body>

    <?php
    if ($feedback != false) {
        foreach ($feedback as $value) {
            echo $value;
        }
    }

    ?>

    <form action="validateEditarUser.php" method="post">
        <input type="hidden" name="editarUser" value="<?php echo ($indexEditar); ?>">

        <input type="text" placeholder="Nome de usuário" name="name" required
            value="<?php echo $usersByIndex->name; ?>"><br>
        <input type="text" placeholder="CPF de usuário" name="cpf" required
            value="<?php echo $usersByIndex->cpf; ?>"> <br>
        <input type="email" placeholder="Email de usuário" name="email" required
            value="<?php echo $usersByIndex->email; ?>"> <br>
        <input type="date" placeholder="Data de nascimento" name="data"
            value="<?php echo $usersByIndex->data; ?>"><br>
        <input type="submit" value="Enviar dados"> <br>

    </form>

    <a href="../listar/listarUsers.php">
        <button>Voltar</button>
    </a>
</body>

</html>