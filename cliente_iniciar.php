<?php 
session_start();
include('config.php');
mysqli_select_db($conn,'$dbname');

if(isset($_SESSION['tipo'])){
    $tipo_session = $_SESSION['tipo'];
    $ID_session = $_SESSION['id'];
    $name_session = $_SESSION['nome'];
    $sql = "SELECT Imagem, Nome, Preco_produto FROM produto";
    
    if ($tipo_session == 'Cliente') {
        $resultado = mysqli_query($conn, $sql);
        if(($resultado) AND (mysqli_num_rows($resultado) != 0)) {
            $rows = mysqli_num_rows($resultado);
            ?>
            <?php
            while($row = mysqli_fetch_array($resultado)) {
                ?>
                <div class="produtos">
                    <h1 id="introducao"><?php echo"Olá " . $name_session . ", esses são os produtos de hoje:" ?></h1>
                    <div id="lista-produtos" class="lista-produtos">
                        <a href="product.html" class="produto"><div id="produto-1" class="produto">
                            <?php echo '<img id="img-p1" class="img-p" src="' . $row['Imagem'] . '"/>'; ?>
                            <h2 id="nome-p1" class="nome-p"><?php echo $row['Nome'] ?></h2>
                            <h1 id="preco-p1" class="preco-p"><?php echo 'R$' . $row['Preco_produto'] ?></h1>
                        </div></a>
                        <a href="product.html" class="produto"><div id="produto-2" class="produto">
                            <img id="img-p1" class="img-p" src="_images/Item_sem_imagem.png"/> 
                            <h2 id="nome-p1" class="nome-p">Carregando...</h2>
                            <h1 id="preco-p1" class="preco-p">R$ 29,00</h1>
                        </div></a>
                        <a href="product.html" class="produto"><div id="produto-2" class="produto">
                            <img id="img-p1" class="img-p" src="_images/Item_sem_imagem.png"/> 
                            <h2 id="nome-p1" class="nome-p">Carregando...</h2>
                            <h1 id="preco-p1" class="preco-p">R$ 29,00</h1>
                        </div></a>
                    </div>
                </div>
                <?php
            }?>
            
            <?php
        } else{
            echo"<script language='javascript' type='text/javascript'>alert('Produto não existe Tente novamente.');window.location.href='cadprod.html'</script>";
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>window.location.href='vendedor.html';</script>";   
    }
} else {
    echo"<script language='javascript' type='text/javascript'>window.location.href='index.html';</script>";
}
            ?>