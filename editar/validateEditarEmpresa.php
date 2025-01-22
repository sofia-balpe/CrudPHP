<?php
session_start();
require("../conexao.php");
global $pdo;

$nomeFantasia = $_POST['nomeFantasia'];
$razaoSocial = $_POST['razaoSocial'];
$cnpj = $_POST['cnpj'];
$idEditar = $_POST['idEditar'];


$erros = [];

if (strlen($nomeFantasia) < 5) {
    $erros[] = "O Nome Fantasia deve ter no mínimo 5 caracteres";
}
if (strlen($cnpj) < 14) {
    $erros[] = "CNPJ deve ter no mínimo 14 caracteres";
}
if (strlen($razaoSocial) < 6) {
    $erros[] = "Razão Social deve ter no mínimo 6 caracteres";
}

if (!empty($erros)) {
    $_SESSION['feedback'] = $erros;
    header('Location: createEmpresa.php');
    exit();
}

$sql = "UPDATE empresa SET fantasia = :fantasia, razao_social = :razao, cnpj = :cnpj WHERE id= :id";

$PDOStatement = $pdo->prepare($sql);
$PDOStatement->bindParam('fantasia', $nomeFantasia);
$PDOStatement->bindParam("razao", $razaoSocial);
$PDOStatement->bindParam("cnpj", $cnpj);
$PDOStatement->bindParam("id", $idEditar);
$PDOStatement->execute();

header("Location: ../listar/listarEmpresas.php");
