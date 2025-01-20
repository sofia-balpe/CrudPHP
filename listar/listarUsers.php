<?php 
// session_start();
include ("../database.php");
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
</head>
<body>
    <h2>Lista de usuários cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach ($clientesData as $index=>$clientes) {
                  echo "<tr>";
                  echo "<td>". $index. "</td>";
                  echo "<td>". $clientes->name. "</td>";
                  echo "<td>". $clientes->cpf. "</td>";
                  echo "<td>". $clientes->email. "</td>";
                  echo "<td>". $clientes->data. " </td>";
                  echo "<td> <a href='../delete/deleteUser.php?delete=$index'> Deletar </a> </td>";
                  echo "<td>  <a href='../editar/editarUser.php?editar=$index'> Editar</a> </td>";
                 
                } 
                
            ?>

        </tbody>

    </table>
    <a href="../create/createUser.php">
    <button>Voltar</button>
    </a>
</body>
</html>