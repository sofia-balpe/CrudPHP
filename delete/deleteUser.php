<?php 
session_start();
include("../database.php");
use App\banco;
$banco = new banco();

$indexDeletarUsers = $_GET['delete'];

if ($banco->validarIndexUser($indexDeletarUsers) == false) {
   
    header('Location: ../listar/listarUsers.php');
    exit();
}

$banco->deletarUsers($indexDeletarUsers);
header('location: ../listar/listarUsers.php');
exit();
?>