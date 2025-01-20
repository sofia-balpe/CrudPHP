<?php 
session_start();

include("../database.php");

use App\banco;
$banco = new banco();

// var_dump($indexEditar);
// exit();

$name = $_POST["name"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$data = $_POST["data"];

$indexEditar = $_POST['editarUser'];
$erros = [];

//validações do nome:
if(strlen($name)<5){
    $erros[] = "O nome deve ter no mínimo 5 caracteres";
}

//validar cpf:
if (!preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$|^\d{11}$/', $cpf)) {
    $erros[] = "CPF inválido";
}


//Validar os erros:
if ($erros != null) {
    $_SESSION['feedback'] = $erros;
    header('Location: editarUser.php');
    exit();
}

$banco->editarUsers($name, $cpf, $email, $data, $indexEditar);
header('Location: ../listar/listarUsers.php');



?>