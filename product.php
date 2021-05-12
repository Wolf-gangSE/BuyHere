<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css"/>
    <link rel="stylesheet" href="_css/produto.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>BuyHere - Produto</title>
</head>
<script src="_javascript/produto.js"></script>
<?php
session_start();
if(isset($_SESSION['tipo'])){ 
    $tipo_session = $_SESSION['tipo'];
    if ($tipo_session == 'Cliente') {
        $id_produto = $_GET['id'];
    }
}
?>
<body>
    <header id="cabecalho">
        <img id="logo" src="_images/BuyHere.png"/>
        <nav id="menu">
            <ul>
                <li><a href="cliente.php">Inicial</a></li>
                <li><a href="profile_cliente.php">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <div id="corpo">
        <form id="fpedido" method="post" action="fazer_pedido.php">
        <span id="conteudo"></span>
        <?php if ($tipo_session == 'Cliente') { echo "<script>
        $(document).ready(function () {
                $.post('product_iniciar.php', {id_produto: " . $id_produto . "}, function(retorna){
                    $('#conteudo').html(retorna);
                });
        });
        </script>"; } else { echo "<script>
            $(document).ready(function () {
                    $.post('product_iniciar.php', function(retorna){
                        $('#conteudo').html(retorna);
                    });
            });
            </script>"; }
            ?>
        </form>
    </div>
    <footer id="rodape"><h4>Universidade de Pernambuco - Campus Garanhuns</h4></footer>
</body>
</html>