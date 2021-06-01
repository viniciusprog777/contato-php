<?php

class EstadoDao
{
    private $conex;

    public function __construct()
    {
        require_once('conex.php');

        $this->conex = new Conex();
    }

    public function list()
    {   $sql = "select * from estados";
    
        $PDO_conex = $this->conex->connectDatabase();
        
        $select = $PDO_conex->query($sql);
        
        $cont=0;
        
        while($rsEstados=$select->fetch(PDO::FETCH_ASSOC))
        {
            $listEstados[] = new Estado();
            $listEstados[$cont]->setId($rsEstados['id']);
            $listEstados[$cont]->setNome($rsEstados['nome']);
            $listEstados[$cont]->setSigla($rsEstados['sigla']);
           
            $cont+=1;
            
        }
        
        
        return $listEstados;
        // $sql = "select * from estados";

        // $estados = [];

        // foreach ($this->conex->query($sql) as $key => $value) {
        //     array_push($estados, $value);
        // }
        
        // return $estados;
    }
}

