<?php

require 'conexao.php';

if(!empty($_SESSION["id"])){
   // header("Location: index.php");
}

$login = new Login();

if(isset($_POST["submit"])){
    $result = $login ->login($_POST['usuario'], $_POST['senha_usuario']); 

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: dashboard.php");
  } else if($result == 10){
    echo "<script>alert('senha incorreta');</script>";
  }  else if($result == 100){
    echo "<script>alert('usuario não registrado');</script>";
  }

}

?>

<?php
/* include_once 'conexao.php';
if(isset($_POST['usuario']) || isset($_POST['senha_usuario'])){
if(strlen($_POST['usuario'])==0){
    echo "preencha seu email";

} else if(strlen($_POST['senha_usuario'])==0){
    echo "preencha sua senhal";
    
} else{
$email = $mysqli ->real_escape_string($_POST['usuario']); $senha = $mysqli ->real_escape_string($_POST['senha_usuario']); $sql_code ="SELECT * FROM usuarios WHERE usuario = '$email' AND senha_usuario = '$senha'"; $sql_query = $mysqli -> query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error); $quantidade = $sql_query -> num_rows;
if($quantidade == 1){ $usuario = $sql_query -> fetch_assoc();
if(!isset($_SESSION)){
    session_start();
} 
$_SESSION['user'] = $usuario['id']; $_SESSION['nome'] = $usuario['nome']; header("Location: dashboard.php");
} else{
    echo "Falha ao logar! E-mail ou senha incorretos";
} } } */
?>

<style>
    body{
        background-color: #23272a;
        font-family: 'Work Sans', sans-serif;
    }

    p{
        font-size: 10pt;
    }
    
    .card {
    height: 250px;
    width: 400px;
    position: absolute;
    background-color: #ffffff;
    padding: 0px;
     border-radius: 20px; 
    margin-left: 34%;
    top: 80px;
    text-align: center;
    }

    
.btn{
    display: inline-block;
    padding: 10px 30px;
    cursor: pointer;
    background: #23272a;
    color: #fff;
    border: none;
    border-radius: 45px;
    text-align: center;
}

input{
    border-radius: 45px;
    text-align: center;
    width: 220px;
    height: 30px;
}

.btn:hover{
    transform: scale(0.98);
}


::-webkit-scrollbar{
    width: 5px;
    background-color:rgba(196, 196, 196, 0.0);
}

::-webkit-scrollbar-thumb {
  background: white; 
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background-color:rgba(196, 196, 196, 0.7);
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>Fire sister - login</title>
</head>
<body>
<?php
/*
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(!empty($dados['SendLogin'])){
  //  var_dump($dados);
    
    $query_usuario = "SELECT id, nome, usuario, senha_usuario
    FROM usuarios
    WHERE usuario =:usuario 
     LIMIT 1";
     $result_usuario = $conn->prepare($query_usuario);

    $result_usuario ->bindParam(':usuario', $dados['usuario'],PDO::PARAM_STR);

    $result_usuario ->execute();

    if(($result_usuario) AND ($result_usuario -> rowCount() != 0)){

        $row_usuario = $result_usuario -> fetch(PDO::FETCH_ASSOC);    
        var_dump($row_usuario);
        if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
           // echo"Usuario logado";
           $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['nome'] = $row_usuario['nome'];
            header("Location: dashboard.php");
        }else{
         //   $_SESSION['msg'] = "<p style='color: red'>Erro: senha inválida</p>";
        
         $_SESSION['id'] = $row_usuario['id'];
         $_SESSION['nome'] = $row_usuario['nome'];
         header("Location: dashboard.php");

        }
    } else{
        $_SESSION['msg'] = "<p style='color: red'>Erro: usuario não encontrado</p>";
    }
}
if(isset($_SESSION['msg'])){
 
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
*/
?>
<div class="card">

<h1>Login</h1>

<form method="POST" action="" autocomplete="off">
    <label>Usuário</label>
    <input type="text" name="usuario" required value="" placeholder="Digite o usuario"><br><br>

    <label>Senha</label>
    <input type="password" name="senha_usuario" required value="" placeholder="Digite a senha"><br><br>
    
    <button class="btn" type="submit" name = "submit"> ACESSAR</button>

<p>Não é cadastrado? <a href="cadastro.php">clique aqui</a> </p>
</form>


</div>

</body>
</html>