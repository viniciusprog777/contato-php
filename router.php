<?php

    $controller =  null;
    $modo = null;

    if (isset($_GET['controller'])) 
    {
        $controller = $_GET['controller'];
        $modo = $_GET['modo'];
    }

    switch ($controller) {
        case 'usuarios':
            
            require_once('controllers/controllerUsuario.php');

            $controllerUsuario = new ControllerUsuario();

            switch ($modo) {
                case 'inserir':
                    
                    $controllerUsuario->inserirUsuario();
                    header('location:index.php');

                break;
                case 'atualizar':
                    
                    $controllerUsuario->atualizarUsuario();
                    
                break;
                case 'excluir':
                    
                    $controllerUsuario->excluirUsuario();
                    
                break;
                case 'listar':
                    
                    $controllerUsuario->listarUsuario();
                    
                break;
                
            }
        
        break;
        case 'estados':

            require_once('controllers/controllerEstado.php');

            $controllerEstado = new ControllerEstado();

            switch ($modo) {
                case 'listar':
                    
                    $controllerEstado->listarEstado();

                break;
            }
        break;
    }
   
           
        
        
    