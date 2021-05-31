<?php
    require_once('models/Estado.php');
    require_once('models/Usuario.php');
    
    $usuario = new Usuario();
    $estado = new Estado();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <form name="frmUsuario" action="controllers/usuario/inserir.php" method="POST" >
        <input name="txtNome" label="Nome" required>
        <input name="txtEmail" label="Email"required>
        <input name="txtTelefone" label="Telefone" required>
        <input name="txtCelular" label="Celular"required>
        <input name="txtCidade" label="Cidade" required>
        <select name="sltEstado" required>
            <option value="" selected disabled >Selecione</option>
            <?php foreach ($estado->list() as $value): ?>
                <option value="<?php echo $value['id']?>"> <?php echo $value['sigla']?> - <?php echo $value['nome']?> </option>
            <?php endforeach ?>
        </select>
        <textarea name="txtMensagem"></textarea>
        <button type="submit">Cadastrar</button>
    </form>
    <h3>Produtos: </h3>
    <?php
        foreach ($usuario->list() as $value) {
            echo "Id: " . $value['id'] . "<br> Nome: " . $value['nome'] .
             "<br> Email: " . $value['email'] . "<br> Telefone: " . $value['telefone'] . 
             "<br> Celular: " . $value['celular'] . "<br> Cidade: " . $value['cidade'] . 
             "<br> Mensagem: " . $value['mensagem'] . "<br> Estado: " . $value['sigla'] ."<hr>";
        }
    ?>
</body>
</html>