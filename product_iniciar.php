<?php 
session_start();
include('config.php');
mysqli_select_db($conn,'$dbname');

if(isset($_SESSION['tipo'])){
    $tipo_session = $_SESSION['tipo'];
    $ID_session = $_SESSION['id'];
    $name_session = $_SESSION['nome'];
    $sql = "SELECT * FROM produto WHERE ID_produto = 3";

    if ($tipo_session == 'Cliente') {
        $resultado = mysqli_query($conn, $sql);
        if(($resultado) AND (mysqli_num_rows($resultado) != 0)) {
            $rows = mysqli_num_rows($resultado);
            ?>
            <h1 id="introducao">Produto selecionado</h1>
            <div id="principal">
            <?php
            while($row = mysqli_fetch_array($resultado)) {
                ?>
                <div id="produto">
                    <div id="img-div">
                    <?php echo '<img id="img-p" class="img-p" src="' . $row['Imagem'] . '"/>'; ?>
                    </div>
                    <div id="detalhes">
                        <p id="nome-p" class="nome-p"><?php echo $row['Nome'] ?></p>
                        <h1 id="preco-p" class="preco-p"><?php echo 'R$' . $row['Preco_produto'] ?></h1>
                        <img id="linha" src="_images/linha.png"/>
                        <p>
                            <label for="quantidade">Quantidade</label>
                            <input type="number" oninput="this.value = Math.abs(this.value)" min='0' name="quantidade" id="quantidade" required="required" name="quantidade"/>
                        </p>
                        <p id="frete"><?php echo 'Frete: R$' . $row['Preco_frete'] ?></p>
                        <div id="buttons">
                            <button id="btn-descricao" type="reset" onclick="ocultarExibir()">Descrição</button>
                            <button id="btn-pedido" type="submit">Fazer Pedido</button>
                        </div>
                        <p id="estoque"><?php echo 'Em estoque: ' . $row['Estoque'] ?></p>
                    </div>
                </div>
                <div id="descricao">
                    <h1 id="titulo">Descrição do produto</h1>
                    <p id="texto"><?php echo $row['Descricao'] ?></p>
                </div>
                <?php
            }?>
            </div>
            <?php
        } else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível achar o produto';window.location.href='index.php';</script>";
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>window.location.href='index.php';</script>";
    }
} else {
    echo"<script language='javascript' type='text/javascript'>window.location.href='index.html';</script>";
}
            ?>