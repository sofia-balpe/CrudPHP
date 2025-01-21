<?php
session_start();
require ("../conexao.php");
global $pdo;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Lista de empresas</h1>
<table>

    <thead>
        <th>Nome Fantasia</th>
        <th>Razão Social</th>
        <th>CNPJ</th>
        <th>Criado em</th>
        <th>Atualizado em</th>
    </thead>

    <tbody>
        <?php 
           $PDOStatement = $pdo->query("SELECT * FROM empresa");
           $results = $PDOStatement->fetchAll();
    
           foreach ($results as $empresa) {
              echo "<tr>";
              echo"<td>" . $empresa["fantasia"]. "</td>" ;
              echo"<td>" . $empresa["razao_social"]. "</td>" ;
              echo"<td>" . $empresa["cnpj"]. "</td>" ;
              echo"<td>" . $empresa["criado_em"]. "</td>" ;
              echo"<td>" . $empresa["update_em"]. "</td>" ;
              echo "</tr>";
           }
         
        ?>

    </tbody>
</table>

</body>
</html>