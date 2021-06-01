<?php

class ControllerUsuario
{
    private $usuarioDao;

    public function __construct()
    {
        require_once('models/Usuario.php');
        require_once('models/dao/UsuarioDao.php');
        
        $this->usuarioDao = new UsuarioDao();
    }
    public function inserirUsuario()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $nome = $_POST['txtNome'];
            $email = $_POST['txtEmail'];
            $telefone = $_POST['txtTelefone'];
            $celular = $_POST['txtCelular'];
            $cidade = $_POST['txtCidade'];
            $mensagem = $_POST['txtMensagem'];
            $estado = $_POST['sltEstado'];
            
            $usuarioClass = new Usuario();
            
            $usuarioClass->setNome($nome);
            $usuarioClass->setEmail($email);
            $usuarioClass->setTelefone($telefone);
            $usuarioClass->setCelular($celular);
            $usuarioClass->setCidade($cidade);
            $usuarioClass->setMensagem($mensagem);
            $usuarioClass->setEstado($estado);
            
            $this->usuarioDao->insert($usuarioClass);

        }

    }
    public function excluirUsuario()
    {
        $id = $_GET['id'];
        
        $this->usuarioDao->delete($id);
        
    }
    public function atualizarUsuario()
    {
        $id = $_GET['id'];
       
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $nome = $_POST['txtnome'];
            $email = $_POST['txtemail'];
            $telefone = $_POST['txttelefone'];
            $celular = $_POST['txtcelular'];
            $cidade = $_POST['txtCidade'];
            $mensagem = $_POST['txtMensagem'];
            $estado = $_POST['sltEstado'];
            
        
            $usuarioClass = new Usuario();
            
            $usuarioClass->setId($id);
            $usuarioClass->setNome($nome);
            $usuarioClass->setEmail($email);
            $usuarioClass->setTelefone($telefone);
            $usuarioClass->setCelular($celular);
            $usuarioClass->setCidade($cidade);
            $usuarioClass->setMensagem($mensagem);
            $usuarioClass->setEstado($estado);
            
                        
            $this->usuarioDao->update($usuarioClass);

        } 
    }
    public function listarUsuario()
    {
        return $this->usuarioDao->list();
    }
    
}
