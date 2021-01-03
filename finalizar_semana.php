<?php 
    session_start();
    if (@$_SESSION['userlogin'] == 'gerente'){

    include 'conexao.php';
    $total = $_SESSION['totalsemana'];
    $sql = "INSERT INTO registro_semana VALUES (null,$total)";
    $result = mysqli_query($conexao,$sql);
    $sql2 = "TRUNCATE `dm`.`pedido`";
    $result2 = mysqli_query($conexao,$sql2);
    mysqli_close($conexao);
    header('location: relatorio.php');
    }
?>