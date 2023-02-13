<?php

require 'conexao.php';

$register = new Register();

if(isset($_POST["submit"])){

    if($_POST["senha_usuario"] == null || $_POST["usuario"] == null){
        header('Location:cadastro.php');
    } else{
        $result = $register->registration($_POST["nome"], $_POST["usuario"], $_POST["senha_usuario"]);
    }

if($result == 1){   header('Location:index.php');}
    else if ($result == 10)  header('Location: cadastro.php');

}

?>
<style>
    body{
        background-color: #23272a;
        font-family: 'Work Sans', sans-serif;
    }
    
    .card {
    height: 330px;
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

form p{
    margin-top: -10px;
    margin-left: 300px;    
}

a{
    color:#23272a;
    text-decoration: none;
}
form p:hover{
    transform: scale(1.20);
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
    <title>Document</title>
</head>
<body>
  
<div class="card">
<h1>Cadastro</h1>
<form method="POST" action="" autocomplete="off">
    
    <label>nome</label>
    <div class=" control "><input type="text" name="nome" placeholder="Digite um nome" autofocus><br><br></div>


    <label>Usuário</label>    
    <div class=" control "><input type="text" name="usuario" placeholder="Digite um email"><br><br></div>
    

    <label>Senha</label>
    <div class=" control "><input type="password" name="senha_usuario" placeholder="Digite a senha"><br><br></div>
    
    
    <button class="btn" type="submit" name="submit"> ACESSAR</button>

    <p><a href="index.php">lembrou?</a> </p>
</form>

</div>

</body>
</html>