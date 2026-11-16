<?php

use App\Emprestimo;
require('../vendor/autoload.php');
$action = $_GET['action'];
$emp = new Emprestimo();
switch($action){
    case 'cadastrar':
        $emp->id_item = $_POST['id_item'];
        $emp->id_servidor = $_POST['id_servidor'];
        $emp->data_emprestimo = $_POST['data_emprestimo'];
        $emp->data_devolucao = $_POST['data_devolucao'];   
        $emp->cadastrar();
        header('location: /reserva/view/Emprestimo/listar.php');
    break;
    case 'alterar':
        $emp = Emprestimo::buscarPorId($_GET['id']);
        $emp->id_item = $_POST['id_item'];
        $emp->id_servidor = $_POST['id_servidor'];
        $emp->data_emprestimo = $_POST['data_emprestimo'];
        $emp->data_devolucao = $_POST['data_devolucao'];   
        $emp->alterar();
        header('location: /reserva/view/Emprestimo/listar.php');        
    break;
    case 'excluir':
        $emp->id = $_GET['id'];
        $emp->excluir();
        header('location: /reserva/view/Emprestimo/listar.php');
    break;
}