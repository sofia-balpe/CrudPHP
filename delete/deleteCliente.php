<?php 
session_start();
include("../database.php");
use App\banco;
$banco = new banco();

$indexDeletar = $_GET['delete'];

if ($banco->validarIndexCliente($indexDeletar) == false) {
    echo "índice não existe";
    header('location: ../listar/listarCliente.php');
    exit();
}

$banco->deletarClientes($indexDeletar);

header('Location: ../listar/listarCliente.php');
exit();


?>