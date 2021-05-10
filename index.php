<?php 
    session_start();
    include('config.php');
    $session_tipo = $_SESSION['tipo'];
    if(isset($session_tipo)){
        if($session_tipo == 'Cliente'){
            echo"<script language='javascript' type='text/javascript'>window.location.href='cliente.html';</script>";
        } else{
            echo"<script language='javascript' type='text/javascript'>window.location.href='vendedor.html';</script>";
        }
    } 
?>