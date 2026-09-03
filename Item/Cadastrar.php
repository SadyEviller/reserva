<?php
include('../App/Item.php');
include('../includes/cabecalho.php');// . = volta um diretorio;
include('formulario.php');
include('../includes/rodape.php');

if(isset($_POST['nome'],$_POST['patrimonio'] )){
    $item = new Item();
    $item->nome = $_POST['nome'];
    $item->descricao = $_POST['descricao'];
    $item->patrimonio = $_POST['patrimonio'];
    echo "<pre>";
    print_r($item);
    echo "<pre>";
}

