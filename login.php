<?php
session_start();
include('config.php');
$email = $_POST['email_login'];
$senha = md5($_POST['senha_login']);
$tipo = $_POST['tipo_login'];
mysqli_select_db($conn,'$dbname');

    if ($tipo == 'Cliente'){
        $sql = "SELECT ID_cliente, Nome_cliente, Email_cliente, Senha_cliente FROM cliente WHERE Email_cliente = '$email' AND Senha_cliente = '$senha'";
        $resultado = mysqli_query($conn, $sql);
        $row_fetch = mysqli_fetch_array($resultado);
        $row = mysqli_num_rows($resultado);
        if ($row <= 0) {
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
            die();
        } else{
            $_SESSION['tipo'] = $tipo;
            $_SESSION['id'] = $row_fetch['ID_cliente'];
            $_SESSION['nome'] = $row_fetch['Nome_cliente'];
            header("Location:index.php");
            exit();
        }
    } else {
        $sql = "SELECT ID_vendedor, Email_vendedor, Senha_vendedor, Nome_vendedor FROM vendedor WHERE Email_vendedor = '$email' AND Senha_vendedor = '$senha'";
        $resultado = mysqli_query($conn, $sql);
        $row_fetch = mysqli_fetch_array($resultado);
        $row = mysqli_num_rows($resultado);
        if ($row <= 0) {
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
            die();
        } else{
            $_SESSION['tipo'] = $tipo;
            $_SESSION['id'] = $row_fetch['ID_vendedor'];
            $_SESSION['nome'] = $row_fetch['Nome_vendedor'];
            header("Location:index.php");
            exit();
        }
    }
?>