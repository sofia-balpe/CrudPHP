<?php
// session_start();
include("../database.php");
use App\banco;
$banco = new banco();

$clientesData = $banco->getClientesData();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <link rel="stylesheet" href="listar.css">
</head>

<body id="idbody">
    <h2 id="idh2">Lista de clientes cadastrados</h2>
    <a href="../index.php">
        <button id="idbtnVoltar"><img id="iconSeta" src="../imagens/iconSeta.png" alt=""></button>
    </a>
    <a href="../index.php">
        <button id="btnHome">
            <img id="iconHome" src="../imagens/iconCasa.png" alt="">
        </button>
    </a>
    <hr>


    <a href="../create/createCliente.php">
        <button id="btnCadCliente"><img id="iconMais" src="../imagens/iconMais.png" alt=""></button>
    </a>

    <table id="idTableCliente">



        <thead id="idthead">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Nascimento</th>
            </tr>
        </thead>

        <tbody id="idtbody">

            <?php
            foreach ($clientesData as $index => $clientes) {
                echo "<tr>";
                echo "<td>" . $index . "</td>";
                echo "<td>" . $clientes->name . "</td>";
                echo "<td>" . $clientes->cpf . "</td>";
                echo "<td>" . $clientes->endereco . "</td>";
                echo "<td>" . $clientes->data . " </td>";
                echo "<td> <a href='../delete/deleteCliente.php?delete=$index'> <button id='btnLixeira'><img id='iconLixeira' src='../imagens/iconLixeira.png' alt=''> </button></a> </td>";
                echo "<td>  <a href='../editar/editarCliente.php?editar=$index'> <button id='btnLapis'> <img id='iconLapis' src='../imagens/iconLapis.png' alt='' ></button></a> </td>";

            }

            ?>

        </tbody>

    </table>
</body>

</html>