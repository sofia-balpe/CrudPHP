<?php
session_start();
require("../conexao.php");
global $pdo;

$idEditar = $_GET['editar'];
$empresaData = $pdo->query("SELECT * FROM empresa where id = $idEditar");
$result = $empresaData->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo ""; ?>
    <form action="validateEditarEmpresa.php" method="post">
        <input type="hidden" name="idEditar" value="<?php echo ($idEditar)?>">
        <input type="text" placeholder="nome da empresa" name="nomeFantasia" value="<?php echo $result['fantasia']; ?>">
        <input type="text" placeholder="razao social" name="razaoSocial" value="<?php echo $result['razao_social']; ?>">
        <input type="text" placeholder="CNPJ" name="cnpj" value="<?php echo $result['cnpj']; ?>">
        <input type="submit" value="Editar">
    </form>
    <a href="../listar/listarEmpresas.php">
        <button> Voltar</button>
    </a>
</body>

</html>