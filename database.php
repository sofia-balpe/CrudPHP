<?php

namespace App;
class banco{

    private mixed $bd;

    public function __construct()
    {
        $bd = file_get_contents(ROOT_PATH . "bd.json");
        $this->bd = json_decode($bd);
    }

    public function cadastrarClientes(){
        
    }
}

?>
