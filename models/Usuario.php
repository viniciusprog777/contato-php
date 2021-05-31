<?php

declare(strict_types=1);

class Usuario {
    private $conex;

    public function __construct()
    {
        try {
            $this->conex = new PDO('mysql:host=localhost;dbname=tecnegocios', 'root', "bcd127");

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    public function list() : array
    {
        $sql = "select usuarios.id, usuarios.nome, usuarios.email, usuarios.telefone, usuarios.celular, usuarios.cidade, usuarios.mensagem, estados.sigla
                from usuarios
                inner join estados
                on usuarios.estado_id = estados.id;";

        $usuarios = [];

        foreach ($this->conex->query($sql) as $key => $value) {
            array_push($usuarios, $value);
        }
        
        return $usuarios;
    }

    public function insert(string $nome,
         string $email,
         string $telefone, 
         string $celular, 
         string $cidade, 
         int $estado, 
         string $mensagem)
    {
        $sql = 'insert into usuarios(nome, email, telefone, celular, cidade, mensagem, estado_id) values(?,?,?,?,?,?,?)';
        
        $prepare = $this->conex->prepare($sql);

        $prepare->bindParam(1, $nome);
        $prepare->bindParam(2, $email);
        $prepare->bindParam(3, $telefone);
        $prepare->bindParam(4, $celular);
        $prepare->bindParam(5, $cidade);
        $prepare->bindParam(6, $mensagem);
        $prepare->bindParam(7, $estado);

        $prepare->execute();

        return $prepare->rowCount();
    }

    public function update(int $id,
        string $nome,
        string $email,
        string $telefone, 
        string $celular, 
        string $cidade, 
        int $estado, 
        string $mensagem)
    {
        $sql = 'update usuarios set nome = ?, email = ?, telefone = ?, celular = ?, cidade = ?, mensagem = ?, estado = ? where id = ?';
        
        $prepare = $this->conex->prepare($sql);

        $prepare->bindParam(1, $nome);
        $prepare->bindParam(2, $email);
        $prepare->bindParam(3, $telefone);
        $prepare->bindParam(4, $celular);
        $prepare->bindParam(5, $cidade);
        $prepare->bindParam(6, $mensagem);
        $prepare->bindParam(7, $estado);
        $prepare->bindParam(8, $id);

        $prepare->execute();

        return $prepare->rowCount();
    }
    public function delete(int $id): int
    {
        $sql = "delete from usuarios where id = ?";

        $prepare = $this->conex->prepare($sql);

        $prepare->bindParam(1, $id);

        $prepare->execute();

        return $prepare->rowCount();
    }
}