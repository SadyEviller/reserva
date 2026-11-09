<?php

use App\Servidor;
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
$servidores = Servidor::listar();
/*echo "<pre>";
print_r($servidores);
echo "</pre>";*/
?>
<main class="container">
    <h2 class="text-center">Lista de Servidores</h2>
    <a href='/reserva/view/servidor/cadastrar.php'>
    <button class='btn btn-success'>Novo Servidor</button></a>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Matricula</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <?php
        foreach ($servidores as $servidor) {
        ?>
            <tr>
            <td><?= $servidor->id ?></td>
            <td><?= $servidor->nome ?></td>
            <td><?= $servidor->cpf ?></td>
            <td><?= $servidor->matricula ?></td>
            <td><?= $servidor->dtn ?></td>
            <td><?= $servidor->telefone ?></td>
            <td><?= $servidor->email ?></td>
            <td><?= $servidor->endereco ?></td>
            <td><a href='/reserva/view/servidor/editar.php?id=<?= $servidor->id ?>'>
            <button class='btn btn-primary'>Editar</button></a>
            <a href='/reserva/action/action_servidor.php?action=excluir&id=<?= $servidor->id ?>'>
            <button class="btn btn-danger" 
            onclick="return confirm('Deseja realmente excluir esse Servidor?');">Excluir</button></td>
            </tr>
        <?php
        }
        ?>
    </table>
</main>