<?php

use App\Servidor;
require('../vendor/autoload.php');
$action = $_GET['action'];
$servidor = new Servidor();
switch($action){
    case 'cadastrar':
        $servidor->nome = $_POST['nome'];
        $servidor->cpf = $_POST['cpf'];
        $servidor->matricula = $_POST['matricula'];
        $servidor->dtn = $_POST['dtn'];
        $servidor->telefone = $_POST['telefone'];
        $servidor->email = $_POST['email'];
        $servidor->endereco = $_POST['endereco'];        
        $servidor->cadastrar();
        header('location: /reserva/view/servidor/listar.php');
    break;
    case 'alterar':
        $servidor = Servidor::buscarPorId($_GET['id']);
        $servidor->nome = $_POST['nome'];
        $servidor->cpf = $_POST['cpf'];
        $servidor->matricula = $_POST['matricula'];
        $servidor->dtn = $_POST['dtn'];
        $servidor->telefone = $_POST['telefone'];
        $servidor->email = $_POST['email'];
        $servidor->endereco = $_POST['endereco'];        
        $servidor->alterar();
        header('location: /reserva/view/servidor/listar.php');        
    break;
    case 'excluir':
        $servidor->id = $_GET['id'];
        $servidor->excluir();
        header('location: /reserva/view/servidor/listar.php');
    break;
}