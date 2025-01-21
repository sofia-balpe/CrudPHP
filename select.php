<?php
global $pdo;
require "conexao.php";

try {
    //Tudo que vc for criar, tem que ser uma query, logo, tem que colocar query aqui no php
    $PDOStatement = $pdo->query("SELECT * FROM empresa");
    $results = $PDOStatement->fetch();

    $PDOStatement = $pdo->query("SELECT * FROM empresa where id=3");
    $results = $PDOStatement->fetchAll();


    $PDOStatement = $pdo->query("SELECT * FROM empresa limit 3");
    $results = $PDOStatement->fetch();


    $PDOStatement = $pdo->query("UPDATE empresa set fantasia = 'sofiatop' WHERE id=3");
    $results = $PDOStatement->execute();
 
    $PDOStatement = $pdo->query("DELETE from  empresa where fantasia = 'sofiatop'");
    $results = $PDOStatement->execute();

    $PDOStatement = $pdo->query("SELECT * FROM empresa limit 3");
    $results = $PDOStatement->fetchAll();
    

    $PDOStatement = $pdo->query("INSERT INTO empresa (fantasia, razao_social, cnpj, criado_em, update_em) VALUES('sbp', 'sofiaTop', '11111111111111', UNIX_TIMESTAMP(), UNIX_TIMESTAMP())");
    $results = $PDOStatement->execute();

    $PDOStatement = $pdo->query("SELECT * FROM empresa ");
    $results = $PDOStatement->fetchAll();
    var_dump($results);
    exit();


} catch (PDOException $e) {
    die($e->getMessage());
}
?>