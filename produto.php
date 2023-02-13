<?php

//session_start(); ob_start(); error_reporting(0); include_once 'conexao.php';

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

.btn-outline{
    display: inline-block;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
    height: 50px;
    width: 80px;
    background-color: transparent;
    border: 1px #fff solid;
    transition: 1s;
    color: #fff;
}

.btn-outline:hover{
    transform: scale(0.95);
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
    border: 1px #fff solid;
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

.grid {
    display: grid;
    /* grid-template-columns: repeat(2, 1fr); */
    gap: 20px;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.grid-3 {
    grid-template-columns: repeat(3, 1fr);
}


.mercadoria .card{
    background-color: white;
    color: #333;
    text-align: center;
    margin: 108px 40px -20px 0px;
    transition: transform 0.2s ease-in;
    border: 1px rgb(196, 196, 196) solid;
    }

.mercadoria img{
        width: 220px;
    } 
    
    .mercadoria .card p{
        font-size: 16pt;
        margin-bottom: 10px;
        text-align: center;
    }
    
    .mercadoria .card:hover{
        transform: scale(1.1);
    }
    
    .mercadoria h1{
        height: 25pt;
        font-weight: bold;
    }

    .card{
    background-color: #fff;
    color: #000;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    margin: 10px;
}

.container2{
    max-width: 100%;
    margin: 0 auto;
    padding: 0px 40px;
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
    <title>Produtos</title>
</head>
<body>
    
    <div class = "navbar">
    <?php 
                if(!isset($_SESSION['id']) || $_SESSION['id'] == null){
                    echo "
                    <a href='index.php'><button class='btn-outline' '> LOGIN</button></a>";
                }
                else{
                    ?>
                    <form method="POST" action="" autocomplete="off">
                                        
                        <button class="btn-outline" type="submit" name="submit">EXCLUIR</button>
                    
                    </form>
                    <?php
                                    }
                        ?>
        <nav class="principal">
           <ul>

           <li><a href="dashboard.php">PAGINA INICIAL</a></li>
            <li><a href="#">PRODUTOS</a></li>
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

    <section class="mercadoria my-4">
<div class="container2 grid grid-3" id="celular">
    <div class="card">
        <img src="./images/blackberry.png">
        <h1>BlackBeryy</h1>
        <p >R$ 599,00</p>
        <a href="https://produto.mercadolivre.com.br/MLB-2742383195-blackberry-q5-8gb-4g-dual-core-12ghz-anatel-exposico-_JM?matt_tool=35422514&matt_word=&matt_source=google&matt_campaign_id=14303413643&matt_ad_group_id=125984291437&matt_match_type=&matt_network=g&matt_device=c&matt_creative=539354956512&matt_keyword=&matt_ad_position=&matt_ad_type=pla&matt_merchant_id=557876269&matt_product_id=MLB2742383195&matt_product_partition_id=1689908189007&matt_target_id=aud-329638142575:pla-1689908189007&gclid=CjwKCAjwg5uZBhATEiwAhhRLHp53e9Q6NnQ_wuvT8WApgdan2ur8WERwJV-pob2-QaIbA3QYiYrEhRoC9wsQAvD_BwE" class="btn my-1" id="sell">comprar</a>
    </div>
    <div class="card">
        <img src="./images/punkt.png">
        <h1>Punkt. MP02</h1>
        <p>R$ 1.990,53</p>
        <a href="https://www.amazon.com/Punkt-MP02-Factory-Unlocked-Smartphone/dp/B07ML3ZHT4" class="btn my-1" id="sell">comprar</a>
    </div>
    <div class="card">
        <img src="./images/caneta.png">
        <h1>Celular - Caneta</h1>
        <p>R$ 249,00</p>
        <a href="https://produto.mercadolivre.com.br/MLB-2724225402-mini-telefone-celular-caneta-lanterna-bluetooth-discador-_JM?matt_tool=43860032&matt_word=&matt_source=google&matt_campaign_id=14303413865&matt_ad_group_id=125984303237&matt_match_type=&matt_network=g&matt_device=c&matt_creative=539354957436&matt_keyword=&matt_ad_position=&matt_ad_type=pla&matt_merchant_id=622164498&matt_product_id=MLB2724225402&matt_product_partition_id=1636960844840&matt_target_id=aud-387561341739:pla-1636960844840&gclid=CjwKCAjwg5uZBhATEiwAhhRLHv9aCfFhWXL7HH9dwbi6UnzzoJ_TH4U6OJtRA_pb6at2xKTIiLL9uBoCOysQAvD_BwE" class="btn my-1" id="sell">comprar</a>
    </div>
    <div class="card">
        <img src="./images/lightphone.png">
        <h1>Light Phone</h1>
        <p>R$ 2.100,82</p>
        <a href="https://www.thelightphone.com/products" class="btn my-1" id="sell">comprar</a>
    </div>
    <div class="card">
        <img src="./images/quadrado.png">
        <h1>Motorola Moto Cubo </h1>
        <p>R$ 1.287,00</p>
        <a href="https://produto.mercadolivre.com.br/MLB-2688084709-motorola-moto-cubo-mb511-rotativo-android-22-gps-gsm-sms-_JM?matt_tool=35422514&matt_word=&matt_source=google&matt_campaign_id=14303413643&matt_ad_group_id=125984291437&matt_match_type=&matt_network=g&matt_device=c&matt_creative=539354956512&matt_keyword=&matt_ad_position=&matt_ad_type=pla&matt_merchant_id=584317020&matt_product_id=MLB2688084709&matt_product_partition_id=1689908189007&matt_target_id=aud-315891067179:pla-1689908189007&gclid=CjwKCAjwg5uZBhATEiwAhhRLHmnCnf63qDYW-j2uPdxEz-q3wXQgp2qzN3OTVEBR20gtveSRPU9MORoCcxYQAvD_BwE" class="btn my-1" id="sell">comprar</a>
    </div>
    <div class="card">
        <img src="./images/minicell.png">
        <h1>Mini Celular</h1>
        <p>R$ 249,00</p>
        <a href="https://produto.mercadolivre.com.br/MLB-2724225402-mini-telefone-celular-caneta-lanterna-bluetooth-discador-_JM?matt_tool=43860032&matt_word=&matt_source=google&matt_campaign_id=14303413865&matt_ad_group_id=125984303237&matt_match_type=&matt_network=g&matt_device=c&matt_creative=539354957436&matt_keyword=&matt_ad_position=&matt_ad_type=pla&matt_merchant_id=622164498&matt_product_id=MLB2724225402&matt_product_partition_id=1636960844840&matt_target_id=aud-387561341739:pla-1636960844840&gclid=CjwKCAjwg5uZBhATEiwAhhRLHv9aCfFhWXL7HH9dwbi6UnzzoJ_TH4U6OJtRA_pb6at2xKTIiLL9uBoCOysQAvD_BwE" class="btn my-1" id="sell">comprar</a>
    </div>
</div>
    </section>
</body>
</html>
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
