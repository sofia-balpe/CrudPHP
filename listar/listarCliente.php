<?php 
// session_start();
include ("../database.php");
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
</head>
<body>
    <h2>Lista de clientes cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach ($clientesData as $index=>$clientes) {
                  echo "<tr>";
                  echo "<td>". $index. "</td>";
                  echo "<td>". $clientes->name. "</td>";
                  echo "<td>". $clientes->cpf. "</td>";
                  echo "<td>". $clientes->endereco. "</td>";
                  echo "<td>". $clientes->data. " </td>";
                  echo "<td> <a href='../delete/deleteCliente.php?delete=$index'> Deletar </a> </td>";
                  echo "<td>  <a href='../editar/editarCliente.php?editar=$index'> Editar</a> </td>";
                 
                } 
                
            ?>

        </tbody>

    </table>
    <a href="../create/createCliente.php">
    <button>Voltar</button>
    </a>
</body>
</html>