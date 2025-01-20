<?php

namespace App;
// require_once "autoload.php";
class banco
{

    private mixed $bd;

    public function __construct()
    {
        $bd = file_get_contents("../bd.json");
        $this->bd = json_decode($bd);
    }

    public function cadastrarClientes(string $name, string $cpf, string $endereco, string $data)
    {
        $cliente = [
            "name" => $name,
            "cpf" => $cpf,
            "endereco" => $endereco,
            "data" => $data
        ];

        $this->bd->clientes[] = $cliente;
        $this->saveData();
    }
    //Função salvar dados:
    public function saveData()
    {
        file_put_contents(__DIR__ . "/bd.json", json_encode($this->bd, JSON_PRETTY_PRINT));
    }

    //Clientes:
    public function getClientesData(): array
    {
        return $this->bd->clientes;
    }

    public function getClienteByIndex(int $index)
    {
        return $this->bd->clientes[$index];
    }
    public function validarIndexCliente(int $index): bool
    {
        return isset($this->bd->clientes[$index]);
    }
    public function editarClientes(string $name, string $cpf, string $endereco, string $data, int $index)
    {
        $cliente = [
            "name" => $name,
            "cpf" => $cpf,
            "endereco" => $endereco,
            "data" => $data
        ];

        $this->bd->clientes[$index] = $cliente;
        $this->saveData();
    }

    public function deletarClientes(int $index)
    {
        unset($this->bd->clientes[$index]);
        $this->saveData();
    }

    //Usuários:
    public function cadastrarUsers(string $name, string $cpf, string $email, string $data)
    {
        $user = [
            "name" => $name,
            "cpf" => $cpf,
            "email" => $email,
            "data" => $data
        ];

        $this->bd->users[] = $user;
        $this->saveData();
    }

    public function getUsersData()
    {
        return $this->bd->users;
    }

    public function getUsersByIndex(int $index)
    {
        return $this->bd->users[$index];
    }
    public function validarIndexUser(int $index): bool
    {
        return isset($this->bd->users[$index]);
    }
    public function editarUsers(string $name, string $cpf, string $email, string $data, int $index)
    {
        $user = [
            "name" => $name,
            "cpf" => $cpf,
            "email" => $email,
            "data" => $data
        ];

        $this->bd->users[$index] = $user;
        $this->saveData();
    }

    public function deletarUsers(int $index){
        unset($this->bd->users[$index]);
        $this->saveData();
    }
}
