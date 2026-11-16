<?php

use App\Emprestimo;
use App\Item;
use App\Servidor;
require('../vendor/autoload.php');
$action = $_GET['action'];
$emp = new Emprestimo();
switch($action){
    case 'cadastrar':
        $item = new Item();
        $item->id = $_POST['item'];
        $servidor = new Servidor();
        $servidor->id = $_POST['servidor'];
        $emp->servidor = $servidor;
        $emp->item = $item;
        $emp->data_emprestimo = $_POST['data_emprestimo'];
        $emp->data_devolucao = $_POST['data_devolucao']; 
        $emp->cadastrar();
        header('location: /reserva/view/Emprestimo/listar.php');
    break;
    case 'alterar':
        $emp = Emprestimo::buscarPorId($_GET['id']);
        $item->id = $_POST['item'];
        $servidor->id = $_POST['servidor'];
        $emp->servidor = $_POST['servidor'];
        $emp->item = $_POST['item'];
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
