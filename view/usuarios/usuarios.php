<?php
    $nome = null;
    $email = null;
    $telefone = null;
    $celular = null;
    $cidade = null;
    $mensagem = null;
    $estado = null;

    require_once('controllers/controllerEstado.php');
    require_once('controllers/controllerUsuario.php');
                
    
    $listarUsuario = new ControllerUsuario();


    if (isset($usuario)) {

        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $telefone = $usuario->getTelefone();
        $celular = $usuario->getCelular();
        $cidade = $usuario->getCidade();
        $mensagem = $usuario->getMensagem();
        $estado = $usuario->getEstado();

        $action = "router.php?controller=usuarios&modo=atualizar&id=".$id;
    }else 
        $action = "router.php?controller=usuarios&modo=inserir";
        
    
    //var_dump($listarUsuario);
?>
        <script src="../js/mask.js"></script>
    <div id="conteiner-form">
    <h1>Cadastro de Usuários</h1>
        <form name="frmUsuario" action="<?php echo($action);?>" method="POST" >
            <div id="div-register">
                <div class="conteiner-input">
                    <label for="txtNome">Nome</label>
                    <input name="txtNome" required>
                </div>
                <div class="conteiner-input">
                    <label for="txtEmail">Email</label>
                    <input type="email" name="txtEmail" label="Email" required>
                </div>
                <div class="conteiner-input">
                    <label for="txtTelefone">Telefone</label>
                    <input type="number "type="tel" name="txtTelefone" id="txtTelefone" onblur="mascaraDeTelefone(this)"   required> 
                </div>
                <div class="conteiner-input">
                    <label for="txtCelular">Celular</label>
                    <input name="txtCelular" label="Celular" onblur="mascaraDeTelefone(this)"required>
                </div>
                <div class="conteiner-input">
                    <label for="txtCidade">Cidade</label>
                    <input name="txtCidade" label="Cidade" required>
                </div>
                <div class="conteiner-input">
                    <label for="sltEstado">Estado</label>
                    <select name="sltEstado" required>
                        <option value="" selected disabled >Selecione</option>
                        <?php
                            $listEstado = new ControllerEstado();
                            
                            $estados = $listEstado->listarEstado();
                            
                            //var_dump($estados);
                            
                            $cont = 0;
                            while ($cont < count($estados)) {
                                ?>
                            <option value="<?php echo ($estados[$cont]->getId());?>"> <?php echo ($estados[$cont]->getSigla());?> - <?php echo ($estados[$cont]->getNome());?> </option>
                            <?php
                            $cont+=1;
                            }
                        ?>
                    </select>
                </div>
                <div class="conteiner-input">
                    <label for="txtMensagem">Mensagem</label>
                <textarea name="txtMensagem"></textarea>
                </div>
            </div>
            <button type="submit">Cadastrar</button>
            
        </form>
    </div>
    <div id="conteiner-list">
        <h1>Usuários: </h1>
        <div id="div-list-usuario-banner">
            <div class="div-item">
                ID
            </div>   
            <div class="div-item">
                NOME
            </div>   
            <div class="div-item">
                Email
            </div>    
            <div class="div-item">
                Telefone
            </div>    
            <div class="div-item">
                Celular
            </div>    
            <div class="div-item">
                Cidade
            </div>    
            <div class="div-item">
                Estado
            </div>  
            
            </div>
            <?php
            
                $listUsuario = new ControllerUsuario();

                $usuarios = $listUsuario->listarUsuario();

                //var_dump($estados);

                $cont = 0;
                while ($cont < count($usuarios)) {
            ?>
             <div class="div-list-usuario">
            <div class="div-item">
                <?php echo($usuarios[$cont]->getId());?>
            </div>   
            <div class="div-item">
                <?php echo($usuarios[$cont]->getNome());?>
            </div>   
            <div class="div-item">
                <?php echo($usuarios[$cont]->getEmail());?>
            </div>    
            <div class="div-item">
                <?php echo($usuarios[$cont]->getTelefone());?>
            </div>    
            <div class="div-item">
                <?php echo($usuarios[$cont]->getCelular());?>
            </div>    
            <div class="div-item">
                <?php echo($usuarios[$cont]->getCidade());?>
            </div>    
            <div class="div-item">
                <?php echo($usuarios[$cont]->getEstado());?>
            </div>  
            
            </div>
    <?php
        $cont+=1;
        }
    
            // foreach ($usuario->list() as $value) {
            //     echo "Id: " . $value['id'] . "<br> Nome: " . $value['nome'] .
            //      "<br> Email: " . $value['email'] . "<br> Telefone: " . $value['telefone'] . 
            //      "<br> Celular: " . $value['celular'] . "<br> Cidade: " . $value['cidade'] . 
            //      "<br> Mensagem: " . $value['mensagem'] . "<br> Estado: " . $value['sigla'] ."<hr>";
            // }
        ?>
    </div>
    
    
