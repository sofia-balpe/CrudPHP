<?php 
session_start();

include("../database.php");

use App\banco;
$banco = new banco();

// var_dump($indexEditar);
// exit();

$name = $_POST["name"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];
$data = $_POST["data"];

$indexEditar = $_POST['editar'];
$erros = [];

//validações do nome:
if(strlen($name)<5){
    $erros[] = "O nome deve ter no mínimo 5 caracteres";
}

//validar cpf:
if (!preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$|^\d{11}$/', $cpf)) {
    $erros[] = "CPF inválido";
}

//Validar endereço:
if (!preg_match('/^[A-Za-z0-9\s,.-]+$/', $endereco)) {
    $erros[] = "Endereço inválido, não são permitidos caracteres especiais";
}

//Validar os erros:
if ($erros != null) {
    $_SESSION['feedback'] = $erros;
    header('Location: editarCliente.php');
    exit();
}

$banco->editarClientes($name, $cpf, $endereco, $data, $indexEditar);
header('Location: ../listar/listarCliente.php');



?>