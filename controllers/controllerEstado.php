<?php

class ControllerEstado
{
    private $estadoDao;

    public function __construct() {

        require_once('models/Estado.php');
        require_once('models/dao/EstadoDao.php');

        $this->estadoDao = new EstadoDao();
    }
    public function listarEstado()
    {
        return $this->estadoDao->list();
    }
}
