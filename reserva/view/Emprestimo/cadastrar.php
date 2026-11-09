<?php
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
?>
<main class="container">
    <form method="POST" action="/reserva/action/action_emprestimo.php?action=cadastrar">
        Item: <input name="id_item" type="number" class="form-control" required>
        Servidor : <input name="id_servidor" type="number" class="form-control">
        Data Emprestimo : <input name="data_emprestimo" type="datetime-local" class="form-control" required>
        Data Devolução : <input name="data_devolucao" type="datatime-local" class="form-control" required>
        <input type="submit" value="cadastrar" class="btn btn-primary"> 
    </form>
</main>
