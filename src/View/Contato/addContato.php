<?php

use \Controller\ContatoController;

include '../../../bootstrap.php';

$id = $_GET['pessoaId'];

if (isset($_POST['submit'])) {
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $descricao = $_POST['descricao'];

    $inputs = array("telefone" => $telefone, "email" => $email, "descricao" => $descricao);
    $controller = new ContatoController;

    $controller->inserir($entityManager, $inputs, $id);

    header('location:index.php?pessoaId=' . $id . '');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Adicionar Contato</title>
</head>

<body>
    <div class="container my-5">

        <h1>Adicionar Contato</h1>

        <button type="submit" name="submit" class="btn btn-danger  my-3" onclick="window.location.href='index.php?pessoaId=<?= $id ?>'">Voltar</button>
        <form method="post">
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" autocomplete="off" />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off" />
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao</label>
                <input type="text" class="form-control" name="descricao" id="descricao" autocomplete="off" />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>


</body>

</html>