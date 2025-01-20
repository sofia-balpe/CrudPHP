<?php 
session_start();
include("../database.php");
use App\banco;
$banco = new banco();

$indexDeletarUsers = $_GET['delete'];

if ($banco->validarIndexCliente($indexDeletarUsers) == false) {
    echo "índice não existe";
    header('location: ../listar/listarUsers.php');
    exit();
}

$banco->deletarUsers($indexDeletarUsers);
header('location: ../listar/listarUsers.php');
exit();
?>