<?php 
    session_start();
    include('config.php');
    if(isset($_SESSION['tipo'])){
        $session_tipo = $_SESSION['tipo'];
        if($session_tipo == 'Cliente'){
            echo"<script language='javascript' type='text/javascript'>window.location.href='cliente.html';</script>";
        } else{
            echo"<script language='javascript' type='text/javascript'>window.location.href='vendedor.html';</script>";
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>window.location.href='index.html';</script>";
    }
?>