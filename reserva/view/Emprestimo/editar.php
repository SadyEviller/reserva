<?php

use App\Emprestimo;
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
$id = $_GET['id'];
$empres = Emprestimo::buscarPorId($id);
?>
<main class="container">
    <h1>Alterar Emprestimo</h1>
    <form method="POST" action="/reserva/action/action_emprestimo.php?action=alterar&id=<?= $id?>">
        Item: <input name="id_item" type="number" value="<?= $empres->id_item?>" class="form-control" required>
        Servidor : <input name="id_servidor" type="number" value="<?= $empres->id_servidor?>" class="form-control">
        Data Emprestimo : <input name="data_emprestimo" type="datetime-local" value="<?= $empres->data_emprestimo?>"class="form-control" required>
        Data Devolução : <input name="data_devolucao" type="datetime-local" value="<?= $empres->data_devolucao?>"class="form-control" required>
        <input type="submit" value="alterar" class="btn btn-primary"> 
    </form>
</main>