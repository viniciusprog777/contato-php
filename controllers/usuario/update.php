<?php      
    require '../../models/Usuario.php';
    $usuario = new Usuario();

    $id = (int) null;
    $nome = (string) null;
    $email = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $cidade = (string) null;
    $estado = (int) null;
    $mensagem = (string) null;
        
    $id = $_GET['id']
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $telefone = $_POST['txtTelefone'];
    $celular = $_POST['txtCelular'];
    $cidade = $_POST['txtCidade'];
    $estado = $_POST['sltEstado'];
    $mensagem = $_POST['txtComentario'];


    $status = $usuario->update($id,$nome, $email, $telefone, $celular, $cidade, $estado, $mensagem);

    if (!$status) {
        echo(  
            "<script>
                alert('Registro Inserido com sucesso!');
                location.href = '../../index.php';
            </script>")
                        
            return false;
    }
    else {
        echo("
            <script>
                alert('Erro ao Inserir os dados no Banco de Dados! Favor verificar a digitação de todos os dados.');
                location.href = '../../index.php';
                window.history.back();
            </script>
        ");
        return true
    }