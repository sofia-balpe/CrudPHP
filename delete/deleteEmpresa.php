<?php 
session_start();
global $pdo;
require "../conexao.php";

$idDelete = $_GET['delete'];

if ("empresa[$idDelete]"==false) {
    echo "Indice não existe";
    header("Location: ../listar/listarEmpresas.php");
    exit();
}

$PDOStatement = $pdo->query("DELETE FROM empresa where id = $idDelete");
$PDOStatement->execute();
header("Location: ../listar/listarEmpresas.php");
exit();


?>