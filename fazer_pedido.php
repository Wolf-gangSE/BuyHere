<?php include_once"config.php"; ?>
<?php 
session_start();
$quantidade = $_POST['quantidade'];
$conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
mysqli_select_db($conn,'$dbname');

if(isset($_SESSION['tipo'])){
    $tipo_session = $_SESSION['tipo'];
    $ID_session = $_SESSION['id'];
    $name_session = $_SESSION['nome'];

    if ($tipo_session == 'Cliente'){
        $sql_produto = "SELECT * FROM produto WHERE ID_produto = 3";
        $resultado_produto = mysqli_query($conn,$sql_produto);
        if(($resultado_produto) AND (mysqli_num_rows($resultado_produto) != 0)) {
            $row_produto = mysqli_fetch_array($resultado_produto);
            if(($row_produto['Estoque']) >= $quantidade ){
                $estoque_ant = $row_produto['Estoque'];
                $frete = $row_produto['Preco_frete'];
                $valor = $row_produto['Preco_produto'];
                $ID_cliente = $ID_session; 
                $ID_produto = $row_produto['ID_produto'];
                $Valor_total = (($frete) + (($valor) * ($quantidade)));
                $sql = "INSERT INTO pedido (ID_pedido, ID_cliente, ID_produto, Valor_total, Data_compra, Data_entrega, Quant_produto) VALUES (default, '$ID_cliente', '$ID_produto', '$Valor_total', '2021-01-01', '2021-01-01', '$quantidade')";
                if(mysqli_query($conn,$sql)){
                    $Estoque = (($estoque_ant) - ($quantidade));
                    $sql_update = "UPDATE produto SET Estoque = '$Estoque' WHERE ID_produto = 3";
                    if(mysqli_query($conn,$sql_update)){
                        echo"<script language='javascript' type='text/javascript'>alert('Pedido cadastrado com sucesso!);window.location.href='index.php'</script>";
                    }
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('A quantidade selecionada é maior que o estoque disponível.');window.location.href='index.php';</script>";
            }
        }
    } else{ 
        echo"<script language='javascript' type='text/javascript'>alert('Você não pode fazer um pedido como vendedor.');window.location.href='index.php';</script>";
    }
} else {
    echo"<script language='javascript' type='text/javascript'>window.location.href='index.html';</script>";
}
?>