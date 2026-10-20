<?php

use App\Servidor;
require('../vendor/autoload.php');
$action = $_GET['action'];
$serv = new Servidor();
switch($serv){
    case 'cadastrar':
        $serv->nome = $_POST['nome'];
        $serv->matricula = $_POST['matricula'];
        $serv->cpf = $_POST['cpf'];
        $serv->telefone = $_POST['telefone'];
        $serv->email = $_POST['email'];
        $serv->endereco = $_POST['endereco'];
        $serv->dtn= $_POST['dtn'];
        $serv->cadastrar();
        
        header('location: /reserva/view/item/listar.php');
        echo "<pre>";
        print_r($serv);
        echo "</pre>";
    break;    
    case 'excluir':
        $serv->id = $_GET['id'];
        $serv->excluir();
        header('location: /reserva/view/item/listar.php');
}