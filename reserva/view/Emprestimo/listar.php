<?php

use App\Emprestimo;
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
$empres = Emprestimo::listar();
/*echo "<pre>";
print_r($empres);
echo "</pre>";*/
?>
<main class="container">
    <h2 class="text-center">Lista de Emprestimos</h2>
    <a href='/reserva/view/Emprestimo/cadastrar.php'>
    <button class='btn btn-success'>Novo Emprestimo</button></a>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Item</th>
                <th>Servidor</th>
                <th>Data Emprestimo</th>
                <th>Data Devolução</th>
            </tr>
        </thead>
        <?php
        foreach ($empres as $emps) {
        ?>
            <tr>
            <td><?= $emps->id?></td>
            <td><?= $emps->item->nome?></td>
            <td><?= $emps->servidor->nome?></td>
            <td><?= date('d/m/Y - h:i', strtotime($emps->data_emprestimo))  ?></td>
            <td><?= date('d/m/Y - h:i', strtotime($emps->data_devolucao)) ?></td>
            
            <td><a href='/reserva/view/Emprestimo/editar.php?id=<?= $emps->id ?>'>
            <button class='btn btn-primary'>Editar</button></a>
            <a href='/reserva/action/action_Emprestimo.php?action=excluir&id=<?= $emps->id ?>'>
            <button class="btn btn-danger" 
            onclick="return confirm('Deseja realmente excluir esse emprestimo?');">Excluir</button></td>
            </tr>
        <?php
        }
        ?>
    </table>
</main>
