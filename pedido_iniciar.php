<?php 
session_start();
include('config.php');
mysqli_select_db($conn,'$dbname');

if(isset($_SESSION['tipo'])){
    $tipo_session = $_SESSION['tipo'];
    $ID_session = $_SESSION['id'];
    $name_session = $_SESSION['nome'];
    $sql = "SELECT * FROM pedido";

    if ($tipo_session == 'Cliente') {
        $resultado = mysqli_query($conn, $sql);
        if(($resultado) AND (mysqli_num_rows($resultado) != 0)) {
            $rows = mysqli_num_rows($resultado);
            ?>
            <h1 id="introducao">Esses são seus pedidos:</h1>
            <div id="principal">
            <?php
            while($row = mysqli_fetch_array($resultado)) {
                $Valor_total = $row['Valor_total'];
                $ID_produto = $row['ID_produto'];
                $sql_produto = "SELECT * FROM produto WHERE ID_produto = '$ID_produto'";
                $resultado_produto = mysqli_query($conn, $sql_produto);
                $row_produto = mysqli_fetch_array($resultado_produto);
                ?>
                <div id="produto">
                    <div id="img-div">
                    <?php echo '<img id="img-p" class="img-p" src="' . $row_produto['Imagem'] . '"/>'; ?>
                    </div>
                    <div id="detalhes">
                        <p id="nome-p" class="nome-p"><?php echo $row_produto['Nome'] ?></p>
                        <h1 id="preco-p" class="preco-p"><?php echo 'R$' . $Valor_total ?></h1>
                        <img id="linha" src="_images/linha.png"/>
                        <p id=valor><?php echo 'Quantidade: ' . $row['Quant_produto'] ?></p>
                        <p id=valor><?php echo 'Valor Unitário: R$' . $row_produto['Preco_produto'] ?></p>
                        <p id="frete"><?php echo 'Frete: R$' . $row_produto['Preco_frete'] ?></p>
                        <img id="linha" src="_images/linha.png"/>
                    </div>
                </div>
                <?php
            }?>
            </div>
            <?php
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>window.location.href='index.php';</script>";
    }
} else {
    echo"<script language='javascript' type='text/javascript'>window.location.href='index.html';</script>";
}
            ?>