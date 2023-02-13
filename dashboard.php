<?php

//session_start(); ob_start(); include_once 'conexao.php';
//error_reporting(0);
/*
if(!isset($_SESSION)){
   $_SESSION['msg'] = "<p style='color: red'>Erro: Necessário realizar o login para acessar a pagina!</p>";
   
    header("Location: index.php ");
}*/

require 'conexao.php';

$select = new Select();
$delete = new Delete();

if(isset($_SESSION["id"]))
{
    $user = $select->selectUserbyid($_SESSION["id"]);
}
else{
 //   header("Location: index.php");
}

if(isset($_POST["submit"])){
    $resulte = $delete->deleteUserbyid($_SESSION["id"]);
    if($resulte == 1){   header('Location:index.php');}
}
?>

<style>
    body{
    padding: 0px;
    margin: 0px;
    background-color: #23272a;
    font-family: 'Work Sans', sans-serif;
}

ul{
    list-style-type: none;
}

a{
    text-decoration: none;
}

.navbar {
    position: absolute;
    justify-content: space-around;
    display: flex;
    width: 90%;
    padding-right: 10%;
    margin-top: 10px;
    font-family: 'Work Sans', sans-serif;
    font-size: 22px;
}

.btn{
    display: inline-block;
    cursor: pointer;
    background: #23272a;
    color: #fff;
    border: none;
    border-radius: 45px;
    text-align: center;
    height: 50px;
    width: 80px;
}

.btn:hover{
    transform: scale(0.95);
}

.btn-outline{
    background-color: transparent;
    border: 1px #fff solid;
    transition: 1s;
}

.btn-outline:hover{
    background-color: rgb(196, 196, 196);
    color: #fff;
    font-weight: bold;
    transition: 1s;
}

.navbar ul{
    display: flex;
}

.navbar li{
    padding:  0px 0px 0px 30px;
}

.navbar a{
    transition: 1s;
}

.navbar a:hover {
/*    border-bottom: 2px #fff solid;*/

font-size: 15pt;
color: rgb(196, 196, 196);
transition: 1s;
}
.navbar li a{
    color:white;
}

.bar1, .bar2, .bar3 {
    width: 35px;
    height: 5px;
    background-color: white;
    margin: 6px 0;
    transition: 0.4s;
  }
  

#deleti{
    /*-webkit-border-radius: 25px;
    -moz-border-radius: 25px;
    border-radius: 25px;*/
    margin: 5% 0 0 48%;
 display: none;   
}
.xbar1, .xbar3 {
    width: 35px;
    height: 5px;
    background-color: white;
    margin: 6px 0;
    transition: 0.4s;
  }

  .xbar1{
    transform: rotate(-45deg) translate(-9px, 6px);
    
  }

  .xbar3{
    transform: rotate(45deg);
  }

.principal img{
    margin-top: -10px;
    width: 40px;
}

.container{
    margin: 20px 0 0 0;
    padding: 20px 30px;
    position: absolute;   
}

.flex{
    top: 57px;
    right: 6%;
    background-color: #23272a;
    height: 48%;
    width: 350px;
    border-radius: 25px;
}

.container p, .container a{
    color: white;
    text-align: center;
    margin: 20px, 20px;
}

.container img{
    margin-left: 25%;
    border-radius: 100%;
    width: 50%;
    margin-bottom: 20px;
}

.menu_inicial{
    margin: 20px 0 0 0;
}

.gif {
    margin: 0px 0 0 0;
    text-align: center;   
    transform: scaleX();
    transition: 1s;
}

.gif img{
    height: 100%;
    width: 100%;
}

#azao{
    display: none;
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
    <title>Painel</title>
</head>
<body>
    
    <div class = "navbar">

    <?php 
                if(!isset($_SESSION['id']) || $_SESSION['id'] == null){
                    echo "
                    <a href='index.php'><button class='btn btn-outline' '> LOGIN</button></a>";
                }
                else{
?>
<form method="POST" action="" autocomplete="off">
                    
    <button class="btn btn-outline" type="submit" name="submit">EXCLUIR</button>

</form>
<?php
                }
    ?>

        <nav class="principal">
           <ul>

           <li><a href="#">PAGINA INICIAL</a></li>
            <li><a href="produto.php">PRODUTOS</a></li>
            <li><img src="./images/logo.png" alt=""></li>
            <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">PAGAMENTO</a></li>
           </ul>
        </nav>


        <nav>

        

                <div name ="mnu" id="mnu" class="menu_inicial" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>


                <div id="deleti" name="deleti" onclick="fechar()">
                    <div class="xbar1"></div>
                    <div class="xbar2"></div>
                    <div class="xbar3"></div>
                </div>


            </div>

            <div class="container flex" id="azao" name = "azao">
                <?php 
                if(!isset($_SESSION['id']) || $_SESSION['id'] == null){
                    echo "<p>vish, ainda não se cadastrou, para logar, clique <a href='cadastro.php' style ='color: aquamarine;'>aqui</a></p>";
                } else{
                    echo "<p>bem vindo ". $user['nome']."</p>" ;
                }

                ?>
               
                <img src="./images/perfil.png" alt="">
                <p><a href="atualizar.php">atualizar</a></p>
                <hr>
                <p><a href="sair.php">Sair</a></p>
            </div>
        </nav>
        
    </div>

    <section>
       <figure class="gif">
             <div id="celularzinho"><img src="https://33.media.tumblr.com/242e3ef5da5f4b0383a0e43739e861ec/tumblr_nfhk85GK4X1t3yue7o1_500.gif"></div>
       </figure> 
 </section>

</body>
</html>
<script src="javascript.js"></script>
<script>function myFunction(x) {
    
   
    mnu.style="display: none";
    deleti.style="display: block";
    azao.style = "display: block";
  }

  function fechar(){
   
    mnu.style="block";
    deleti.style="display: none";
    azao.style = "display: none";
  }

</script>
