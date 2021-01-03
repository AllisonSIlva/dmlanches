<?php
    session_start();
    include "conexao.php";
    $codigo = $_POST['codigo'];
    $quantidade = $_POST['quantidade'];
    $sql1 = "SELECT * FROM itens WHERE codigo = $codigo ";
    $result1 = mysqli_query($conexao,$sql1);
    foreach($result1 as $item){
        $preco = $item['Preço'];
        $nome = $item['Nome'];
    }
    $sql2 = "INSERT INTO itens_pedido VALUES (null,'$nome',$preco,$quantidade)";
    $result2 = mysqli_query($conexao,$sql2);
    mysqli_close($conexao);

    header("location: vendas.php");

?>  