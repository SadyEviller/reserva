<?php

use App\Emprestimo;
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
$empres = Emprestimo::listar();
echo "<pre>";
print_r($empres);
echo "</pre>";
?>
<main class="container">
    <h2 class="text-center">Lista de Emprestimos</h2>
    <a href='/reserva/view/Emprestimo/cadastrar.php'>
    <button class='btn btn-success'>Novo Emprestimo</button></a>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>id_Item</th>
                <th>id_Servidor</th>
                <th>Data Emprestimo</th>
                <th>Data Devolução</th>
            </tr>
        </thead>
        <?php
        foreach ($empres as $emps) {
        ?>
            <tr>
            <td><?= $emps->id_item?></td>
            <td><?= $emps->id_servidor?></td>
            <td><?= $emps->data_emprestimo ?></td>
            <td><?= $emps->data_devolucao ?></td>
            
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