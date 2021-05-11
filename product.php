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
        <script>
        $(document).ready(function () {
                $.post('product_iniciar.php', function(retorna){
                    //Subtitui o valor no seletor id="conteudo"
                    $("#conteudo").html(retorna);
                });
        });
        </script>
        </form>
    </div>
    <footer id="rodape"><h4>Feito por ------</h4></footer>
</body>
</html>