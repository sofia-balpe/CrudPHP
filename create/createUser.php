<?php 
session_start();
$feedback = $_SESSION['feedback']?? false;

unset($_SESSION['feedback']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    

<?php
if ($feedback!=false) {
   foreach ($feedback as $value) {
    echo $value;
   }
} 
?>
    <form action="validateCreateUser.php" method="post">

    <input type="text" placeholder="Nome de usuário" name="name" required><br>
    <input type="text" placeholder="CPF de usuário" name="cpf" required> <br>
    <input type="email" placeholder="Email de usuário" name="email" required> <br>
    <input type="date" placeholder="Data de nascimento" name="data"><br>
    <input type="submit" value="Enviar dados"> <br>
    </form>
<a href="../listar/listarUsers.php">listar Usuários</a>
</body>
</html>