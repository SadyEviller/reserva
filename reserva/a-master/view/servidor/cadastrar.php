<?php
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/menu.php");
include("../includes/rodape.php");
?>
<main class="container">
    <form method="POST" action="/reserva/action/action_servidor.php?action=cadastrar">
        Nome * : <input name="nome" type="text" class="form-control" required>
        CPF * : <input name="cpf" type="text" class="form-control">
        Matricula * : <input name="matricula" type="number" class="form-control" required>
        Data de Nascimento * : <input name="dtn" type="date" class="form-control" required>
        Telefone * : <input name="telefone" type="text" class="form-control" required>
        Email * : <input name="email" type="text" class="form-control" required>
        Endereço * : <input name="endereco" type="text" class="form-control" required>
        <input type="submit" value="cadastrar" class="btn btn-primary"> 
    </form>
</main>
