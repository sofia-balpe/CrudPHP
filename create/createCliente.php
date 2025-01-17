<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="validateCreateCliente.php" method="$_POST">

    <input type="text" placeholder="Nome de usuário" name="name"><br>
    <input type="text" placeholder="CPF de usuário" name="cpf"> <br>
    <input type="text" placeholder="Endereço de usuário" name="endereco"> <br>
    <input type="submit" value="Enviar dados"> <br>
    </form>

</body>
</html>