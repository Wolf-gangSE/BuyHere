<?php include_once"config.php"; ?>
<?php
$email = $_POST['email_cad'];
$senha = md5($_POST['senha_cad']);
$nome = $_POST['nome_cad'];
$sobrenome = $_POST['sobrenome_cad'];
$ddd = $_POST['ddd_cad'];
$telefone = $_POST['tel_cad'];
$cep = $_POST['cep_cad'];
$cidade = $_POST['cidade_cad'];
$bairro = $_POST['bairro_cad'];
$rua = $_POST['rua_cad'];
$numero = $_POST['num_cad'];
$complemento = $_POST['comp_cad'];
$tipo = $_POST['tipo_cad'];
$conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
mysqli_select_db($conn,'$dbname');

    if ($tipo == 'Cliente'){
        $sql = "INSERT INTO cliente (ID_cliente, CEP_cliente, Telefone_cliente, DDD_cliente, Senha_cliente, Email_cliente, Nome_cliente, Sobrenome_cliente, Cidade_cliente, Bairro_cliente, Rua_cliente, Numero_cliente, Complemento_cliente) VALUES (default, '$cep', '$telefone', '$ddd', '$senha', '$email', '$nome', '$sobrenome', '$cidade', '$bairro', '$rua', '$numero', '$complemento')";

        if(mysqli_query($conn,$sql)){
            echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso! Faça seu login.');window.location.href='index.html'</script>";
        } else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário! Tente novamente.');window.location.href='cadastro.html'</script>";
        }
    } else{
        $sql = "INSERT INTO vendedor (ID_vendedor, CEP_vendedor, Telefone_vendedor, DDD_vendedor, Senha_vendedor, Email_vendedor, Nome_vendedor, Sobrenome_vendedor, Cidade_vendedor, Bairro_vendedor, Rua_vendedor, Numero_vendedor, Complemento_vendedor) VALUES (default, '$cep', '$telefone', '$ddd', '$senha', '$email', '$nome', '$sobrenome', '$cidade', '$bairro', '$rua', '$numero', '$complemento')";

        if(mysqli_query($conn,$sql)){
            echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso! Vá para tela de login.');window.location.href='index.html'</script>";
        } else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário! Tente novamente.');window.location.href='cadastro.html'</script>";
        }
    }
?>