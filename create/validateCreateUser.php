<?php 
session_start();
include("../database.php");
use App\banco;

$banco = new banco();

$name = $_POST["name"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$data = $_POST["data"];

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
    header("location: createCliente.php");
    exit();
}

$banco->cadastrarUsers($name, $cpf, $email, $data);
header("Location: createUser.php");
?>