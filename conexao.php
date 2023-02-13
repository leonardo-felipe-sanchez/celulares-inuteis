<?php
session_start();

/*$host = "localhost";
$user = "root";
$pass = "Hitoribocchinota10.";
$database = "firesister";

$mysqli = new mysqli($host, $user, $pass, $database) ;

if($mysqli  -> error) die("Falha ao conectar ao banco de dados". $mysqli -> error);
*/

class Connection {

    public $host = "localhost";
    public $user = "root";
    public $pass = "Hitoribocchinota10.";
    public $database = "firesister";
    public $conn;

    public function __construct()
    {
        $this ->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
    
        if(mysqli_connect_errno()){

            echo "conexao mal sucedida";
        }


    }

}


class Register extends Connection{

    public function registration($nome, $usuario, $senha){
     $duplicate = mysqli_query($this->conn, "SELECT COUNT(*) AS total FROM usuarios WHERE usuario = '$usuario'");  
        if(mysqli_num_rows($duplicate) >  0){
            $query = "INSERT INTO usuarios(nome, usuario, senha_usuario, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";
            $result = mysqli_query($this->conn, $query);
            return 1;

        } else{
            return 10;
        }
  
    }
}


class login extends Connection{
    public $id;
    public function login($usuario, $senha){

    $result = mysqli_query($this->conn, "SELECT * FROM usuarios WHERE nome = '$usuario' OR usuario = '$usuario'");

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){

       if($senha == $row["senha_usuario"]){
        $this->id = $row["id"];
       
        return 1;
       } else{
        return 10;
       }
        
    } else{
        return 100;
    }
}


public function idUser(){
    return $this->id;
}

}

class Select extends Connection{
    public function selectUserbyid($id){
        $result = mysqli_query($this->conn, "SELECT * FROM usuarios Where id = '$id'");
        return mysqli_fetch_assoc($result);
    }  
  }

  class Delete extends Connection{

    public function deleteUserbyid($id){
        $result = mysqli_query($this->conn, "DELETE FROM usuarios Where id = '$id'");
        return 1;
    }

  }

  class Upadate extends Connection{
    public function updateUserbyid($id, $email, $senha){
        $result = mysqli_query($this->conn, "UPDATE usuarios
                                                SET usuario = '$email', senha_usuario = '$senha'
                                                WHERE id = '$id'");
        return 1;
    }
  }

?>