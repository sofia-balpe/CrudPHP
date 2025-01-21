<?php 
session_start();
global $pdo;
require "../conexao.php";

$NomeFantasia = $_POST["nomeFantasia"];
$razaoSocial = $_POST["razaoSocial"];
$cnpj = $_POST["cnpj"];

$erros = [];

if (strlen($NomeFantasia) < 5 ) {
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

$PDOStatement = $pdo->query("INSERT INTO empresa (fantasia, razao_social, cnpj, criado_em, update_em) VALUES('{$NomeFantasia}', '{$razaoSocial}', '{$cnpj}', UNIX_TIMESTAMP(), UNIX_TIMESTAMP())");
var_dump($PDOStatement->queryString);
$results = $PDOStatement->execute();
exit();

header("location: createEmpresa.php");
