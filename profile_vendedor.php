<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css"/>
    <link rel="stylesheet" href="_css/profile.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>BuyHere - Home</title>
</head>
<body>
    <header id="cabecalho">
        <img id="logo" src="_images/BuyHere.png"/>
        <nav id="menu">
            <ul>
                <li><a href="vendedor.php">Inicial</a></li>
                <li><a href="cadprod.html">Cadastro</a></li>
                <li><a href="profile_vendedor.php">Perfil</a></li>
                <li><a href="logout.php"><img id="sair" src="_images/logout.png"></a></li>
            </ul>
        </nav>
    </header>
    <div id="corpo">
        <h1 id="introducao">Perfil</h1>
        <span id="conteudo"></span>
        <script>
        $(document).ready(function () {
				$.post('listar_vendedor.php', function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
		});
        </script>
    </div>
    <footer id="rodape"><p>Universidade de Pernambuco - Campus Garanhuns</p></footer>
</body>
</html>