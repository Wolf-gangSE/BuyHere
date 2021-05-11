<?php 
session_start();
include('config.php');
mysqli_select_db($conn,'$dbname');

if(isset($_SESSION['tipo'])){
    $tipo_session = $_SESSION['tipo'];
    $ID_session = $_SESSION['id'];
    $sql = "SELECT * FROM cliente where ID_cliente = '$ID_session'";
    
    if ($tipo_session == 'Cliente') {
        $resultado = mysqli_query($conn, $sql);
        if(($resultado) AND (mysqli_num_rows($resultado) != 0)) {
            ?>
                <?php
                while($row = mysqli_fetch_array($resultado)){
                    ?>
                    <div id=dados> 
                        <p>
                            Nome <h4><?php echo $row['Nome_cliente']; ?></h4>
                        </p>
                        <p>
                            Sobrenome <h4><?php echo $row['Sobrenome_cliente']; ?></h4>
                        </p>
                        <p>
                            DDD <h4><?php echo $row['DDD_cliente']; ?></h4>
                        </p>
                        <p>
                            Telefone <h4><?php echo $row['Telefone_cliente']; ?></h4>
                        </p>
                        <p>
                            Email <h4><?php echo $row['Email_cliente']; ?><h4>
                        </p>
                        <p>
                            Cep <h4><?php echo $row['CEP_cliente']; ?></h4>
                        </p>
                        <p>
                            Cidade <h4><?php echo $row['Cidade_cliente']; ?></h4>
                        </p>
                        <p>
                            Bairro <h4><?php echo $row['Bairro_cliente']; ?></h4>
                        </p>
                        <p>
                            Rua <h4><?php echo $row['Rua_cliente']; ?></h4>
                        </p>
                        <p>
                            Complemento <h4><?php echo $row['Complemento_cliente']; ?></h4>
                        </p>
                        <p>
                            Tipo <h4><?php echo $tipo_session; ?></h4>
                        </p>
                    </div>
                    <?php
                }?>
        <?php
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Usuário não existe Tente novamente.');window.location.href='index.html'</script>";
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>window.location.href='vendedor.html';</script>";
    }
} else {
    echo"<script language='javascript' type='text/javascript'>window.location.href='index.html';</script>";
}
?>