<?php

class UsuarioDao
{
    private $conex;

    public function __construct()
    {
        require_once('conex.php');

        $this->conex = new Conex();
    }

    public function insert(Usuario $usuario)
    {
        $sql = 'insert into usuarios(nome, email, telefone, celular, cidade, mensagem, estado_id) values(?,?,?,?,?,?,?)';
        
        $db = $this->conex->connectDatabase();

        $prepare = $db->prepare($sql);
        
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $telefone = $usuario->getTelefone();
        $celular = $usuario->getCelular();
        $cidade = $usuario->getCidade();
        $mensagem = $usuario->getMensagem();
        $estado = $usuario->getEstado();

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
    public function delete(int $id): int
    {
        $sql = "delete from usuarios where id = ?";

        $db = $this->conex->connectDatabase();

        $prepare = $db->prepare($sql);

        $prepare->bindParam(1, $id);

        $prepare->execute();

        if ($prepare->rowCount()) {
            header('location:index.php');
        }else {
            echo('Erro no Script de Delete');
        }
        
    }
    public function update(Usuario $usuario)
    {
        $sql = 'update usuarios set nome = ?, email = ?, telefone = ?, celular = ?, cidade = ?, mensagem = ?, estado = ? where id = ?';
        
        $prepare = $this->conex->prepare($sql);

        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $telefone = $usuario->getTelefone();
        $celular = $usuario->getCelular();
        $cidade = $usuario->getCidade();
        $mensagem = $usuario->getMensagem();
        $estado = $usuario->getEstado();

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
    public function list() : array
    {   
        $sql = "select usuarios.id, usuarios.nome, usuarios.email, usuarios.telefone, usuarios.celular, usuarios.cidade, usuarios.mensagem, estados.sigla
                from usuarios
                inner join estados
                on usuarios.estado_id = estados.id;";

        $PDO_conex = $this->conex->connectDatabase();
        
        $select = $PDO_conex->query($sql);
        
        $cont=0;
        
        while($rsUsuarios=$select->fetch(PDO::FETCH_ASSOC))
        {
            $listUsuario[] = new Usuario();
            $listUsuario[$cont]->setId($rsUsuarios['id']);
            $listUsuario[$cont]->setNome($rsUsuarios['nome']);
            $listUsuario[$cont]->setEmail($rsUsuarios['email']);
            $listUsuario[$cont]->setTelefone($rsUsuarios['telefone']);
            $listUsuario[$cont]->setCelular($rsUsuarios['celular']);
            $listUsuario[$cont]->setCidade($rsUsuarios['cidade']);
            $listUsuario[$cont]->setMensagem($rsUsuarios['mensagem']);
            $listUsuario[$cont]->setEstado($rsUsuarios['sigla']);
            
            $cont+=1;
            
        }
        
        
        return $listUsuario;

        // $usuarios = [];

        // foreach ($this->conex->query($sql) as $key => $value) {
        //     array_push($usuarios, $value);
        // }
        
        // return $usuarios;
    }
}
