<?php

//CONEXÃO: Pega o código de conexao.php e executa aqui
require_once 'conexao.php';

//Sessão
session_start();

//Botão Enviar
if(isset($_POST['botaoEntrar'])):
    $erros = array();
    $login = mysqli_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    //se o campo estiver vazio
    if(empty($login) or empty($senha)):
        $erros[] = "<div class='msgerro'<li> O campo login/senha precisa ser preenchido </li></div>";
    else:
        //Se existe no meu banco de daods
        $sql = "SELECT login FROM sistemalogin WHERE login = '$login'";
        $resultado = mysqli_query($conexao, $sql);

    //Verificiar se o login tem no Banco de dados
    if(mysqli_num_rows($resultado) > 0):
        //CRIPTOGRAFAR A SENHA
        $senha = md5($senha);

        //Verificar a senha existente
        $sql = "SELECT * FROM sistemalogin WHERE login = '$login' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $sql);

    //Verificiar se o login tem no Banco de dados
    if(mysqli_num_rows($resultado) == 1 ):
        $dados = mysqli_fetch_array($resultado);
        mysqli_close($conexao);
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id'];
        header('Location: sistema_Login/home.php');
        else:
            $erros[] = "<div class='msgerro'<li>Usuário e senha não confere </li></div>";
        endif;



        else:
            $erros[] = "<div class='msgerro'<li> Usuário inexistente </li></div>";
        endif;
    endif;
endif;
?>

<!DOCTYPE html>

<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - TCC </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sistema_login/css/estiloLogin.css">

</head>

<body class="center-form">
    

<div class="center-form">
    
        <h2>Sistema de gerenciamento de TCC</h2>

           <?php
         //se não estiver vazio, contem algum erro
          if(!empty($erros)):
          foreach($erros as $erro):
            echo $erro;
           endforeach;
            endif;
            ?>

        
             <h3>Login</h3> <br>
             <p> user: </p>

        
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
             <input name="usuario" name="text" class="usuario" placeholder="Seu usuário" autofocus=""> </br>
             <input name="senha" class="senha" type="password" placeholder="Sua senha"> <br> <br>
    
             <button type="submit" name="botaoEntrar" class="botao">Entrar</button>
             </form>
        </div>
   
            <div class="informacaologin">
            <p>user: admin</p>
            <p>senha: 123456</p>
            </div>
   
</body>

</html>