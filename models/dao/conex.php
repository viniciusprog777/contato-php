<?php

class Conex 
{
    private $server;
    private $user;
    private $password;
    private $database;
    
    public function __construct()
    {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "bcd127";
        $this->database = "tecnegocios";
    }

    public function connectDatabase()
    {
        try {
            $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database,$this->user,$this->password);
            return $conexao;
        } catch(PDOException $e)
        {
            echo("Erro ao tentar a conexão com o BD! <br>
                Linha: ".$e->getLine() . " <br>
                Mensagem: ".$e->getMessage()
            );
        }
    }
}
