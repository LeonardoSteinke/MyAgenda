<?php

use \Controller\PessoaController;

include '../../../bootstrap.php';


if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $inputs = array("nome" => $nome, "cpf" => $cpf);
    $controller = new PessoaController;

    $controller->inserir($entityManager, $inputs);

    header('location:../../index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Adicionar pessoa</title>
</head>

<body>
    <div class="container my-5">
        <h1>Adicionar Pessoa</h1>
        <button class="btn btn-danger my-3" onclick="window.location.href='../../index.php'">
            Voltar
        </button>

        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" autocomplete="off" />
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="number" class="form-control" name="cpf" id="cpf" autocomplete="off" />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>


</body>

</html>