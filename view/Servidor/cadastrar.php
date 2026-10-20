<?php
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
?>
<main class="container">
    <form method="POST" action="/reserva/action/action_item.php?action=cadastrar">
        Nome * : <input name="nome" type="text" class="form-control" required>
        matricula:<input name="matricula" type="text" class="form-control" required>
        cpf:<input name="cpf" type="text" class="form-control" required>
        telefone:<input name="telefone" type="number" class="form-control" required>
        Email * : <input name="email" type="text" class="form-control" required>
        Endereço : <input name="endereco" type="text" class="form-control" required>
        Data de nascimento:<input name="dtn" type="datetime" class="form-control" required>
        <input type="submit" value="cadastrar" class="btn btn-primary"> 
    </form>
</main>
