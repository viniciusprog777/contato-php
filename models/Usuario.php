<?php

declare(strict_types=1);

class Usuario {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $celular;
    private $cidade;
    private $mensagem;
    private $estado;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id; 
    }
    
    public function setId($id)
    {
        $this->id = $id; 
    }
    public function getEmail()
    {
        return $this->email; 
    }
    
    public function setEmail($email)
    {
        $this->email = $email; 
    }
    public function getNome()
    {
        return $this->nome; 
    }
    public function setNome($nome)
    {
        $this->nome = $nome; 
    }
    
    public function getTelefone()
    {
        return $this->telefone; 
    }
    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone; 
    }
    
    public function getCelular()
    {
        return $this->celular; 
    }
    
    public function setCelular($celular)
    {
        $this->celular = $celular; 
    }
    public function getCidade()
    {
        return $this->cidade; 
    }
    
    public function setCidade($cidade)
    {
        $this->cidade = $cidade; 
    }
    public function getMensagem()
    {
        return $this->mensagem; 
    }
    
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem; 
    }
    public function getEstado()
    {
        return $this->estado; 
    }
    
    public function setEstado($estado)
    {
        $this->estado = $estado; 
    }
    
}