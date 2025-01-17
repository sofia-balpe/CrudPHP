<?php 
session_start();
include("../database.php");
use App\banco;

$banco = new banco();

$name = $_POST["name"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];

$erros = [];
?>