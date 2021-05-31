<?php 

class Estado{
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
        $sql = "select * from estados";

        $estados = [];
        
        foreach ($this->conex->query($sql) as $key => $value) {
            array_push($estados, $value);
        }

        return $estados;
    }
}