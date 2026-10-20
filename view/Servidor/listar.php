<?php
use App\Servidor;
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
$servs = Servidor::listar();
/*echo "<pre>";
print_r($itens);
echo "</pre>";*/
?>
<main class="container">
    <h2 class="text-center">Lista de Servidores</h2>
    <a href='/reserva/view/Servidor/cadastrar.php'>
    <button class='btn btn-success'>Novo servidor</button></a>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>email</th>
                <th>endereço</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>
        <?php
        foreach ($servs as $serv) {
        ?>
            <tr>
            <td><?= $serv->id ?></td>
            <td><?= $serv->nome ?></td>
            <td><?= $serv->matricula ?></td>
            <td><?= $serv->cpf ?></td>
            <td><?= $serv->telefone ?></td>
            <td><?= $serv->email ?></td>
            <td><?= $serv->endereco ?></td>
            <td><?= $serv->dtn ?></td>
            <td><a href='/reserva/view/Servidor/editar.php?id=<?= $serv->id ?>'>
            <button class='btn btn-primary'>Editar</button></a>
            <a href='/reserva/action/action_servidor.php?action=excluir&id=<?= $serv->id ?>'>
            <button class="btn btn-danger" 
            onclick="return confirm('Deseja realmente excluir esse Item?');">Excluir</button></td>
            </tr>
        <?php
        }
        ?>
    </table>
</main>