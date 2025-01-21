<?php
// session_start();
include("../database.php");
use App\banco;
$banco = new banco();

$clientesData = $banco->getUsersData();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="listar.css">
</head>

<body id="idbody">
    <h2 id="idh2">Lista de usuários cadastrados</h2>
    <a href="../index.php">
        <button id="btnVoltarUser"><img id="iconSeta" src="../imagens/iconSeta.png" alt=""></button>
    </a>
    <hr>

    <a href="../create/createUser.php">
        <button id="btnCadUser"><img id="iconMais" src="../imagens/iconMais.png" alt=""></button>
    </a>
    <table id="idTable">
        <thead id="idthead">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody id="idtbody">

            <?php
            foreach ($clientesData as $index => $clientes) {
                echo "<tr>";
                echo "<td>" . $index . "</td>";
                echo "<td>" . $clientes->name . "</td>";
                echo "<td>" . $clientes->cpf . "</td>";
                echo "<td>" . $clientes->email . "</td>";
                echo "<td>" . $clientes->data . " </td>";
                echo "<td> <a href='../delete/deleteUser.php?delete=$index'> <button id='btnLixeira'><img id='iconLixeira' src='../imagens/iconLixeira.png' alt=''> </button> </a> </td>";
                echo "<td>  <a href='../editar/editarUser.php?editar=$index'>  <button id='btnLapis'> <img id='iconLapis' src='../imagens/iconLapis.png' alt='' ></button></a> </td>";

            }
            ?>

        </tbody>

    </table>
    </a>
</body>

</html>