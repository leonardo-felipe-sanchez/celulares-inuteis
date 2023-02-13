<?php
/*
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($mysqli, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($mysqli, trim($_POST['senha_usuario']));

$sqA = "SELECT COUNT(*) AS total FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($mysqli, $sqA);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location:cadastro.php');
    exit;
}

$sqA = "INSERT INTO usuarios(nome, usuario, senha_usuario, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";

if($mysqli->query($sqA) === TRUE){
    $_SESSION['status_cadastro'] = true;
}

$mysqli ->close();

header('Location: index.php');
exit;*/
?>