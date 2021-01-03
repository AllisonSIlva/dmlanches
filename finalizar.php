<?php 
    session_start();
    if (@$_SESSION['userlogin'] == 'gerente' || @$_SESSION['userlogin'] == 'funcionario'){

    include 'conexao.php';
    $total = $_SESSION['total'];
    $sql = "INSERT INTO pedido VALUES ($total,null)";
    $result = mysqli_query($conexao,$sql);
    $sql2 = "TRUNCATE `dm`.`itens_pedido`";
    $result2 = mysqli_query($conexao,$sql2);
    mysqli_close($conexao);
    header('location: index.php');
    }
?>