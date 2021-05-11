<?php include_once"config.php"; ?>
<?php 
session_start();
$session_ID = $_SESSION['id'];
$session_tipo = $_SESSION['tipo'];
$nome = $_POST['nome_cad'];
$valor = $_POST['valor'];
$frete = $_POST['valor-frete'];
$estoque = $_POST['estoque'];
$descricao = $_POST['lb-descricao'];
$conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
mysqli_select_db($conn,'$dbname');
if ($session_tipo == 'Vendedor'){
    if (isset($_FILES['img-pd'])){
        $imagem = $_FILES['img-pd']['name'];
        $pasta_dir = "_images/imagensProdutos/";
        $imagem_nome = $pasta_dir . $imagem;
        move_uploaded_file($_FILES["img-pd"]['tmp_name'], $imagem_nome);

        $sql = "INSERT INTO produto (ID_produto, ID_vendedor, Nome, Estoque, Imagem, Descricao, Preco_produto, Preco_frete) VALUES (default, '$session_ID', '$nome', '$estoque', '$imagem_nome', '$descricao', '$valor', '$frete')";
        if(mysqli_query($conn, $sql)){
            echo"<script language='javascript' type='text/javascript'>alert('A imagem foi salva na base de dados.');window.location.href='vendedor.html'</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível salvar a imagem na base de dados.');window.location.href='index.php'</script>";
        }
    } else{
        echo"<script language='javascript' type='text/javascript'>alert('Imagem não carregada');window.location.href='cadprod.php'</script>";
    }
} else{
    echo"<script language='javascript' type='text/javascript'>alert('Você precisa estar logado como um vendedor');window.location.href='index.php'</script>";
}
?>
    