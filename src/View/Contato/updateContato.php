<?php

use Controller\ContatoController;

include '../../../bootstrap.php';

$id = $_GET['contatoId'];
$pessoaId = $_GET['pessoaId'];
$controller = new ContatoController;

$result = $controller->buscarPorId($entityManager, $id);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $descricao = $_POST['descricao'];

    $inputs = array("email" => $email, "telefone" => $telefone, "descricao" => $descricao);

    $result = $controller->atualizar($entityManager, $id, $inputs);

    header('location:index.php?pessoaId=' . $pessoaId . '');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User CRUD</title>
</head>

<body>
    <div class="container my-5">

        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" autocomplete="off" value="<?php echo $result->getEmail() ?>" />
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" autocomplete="off" value="<?php echo $result->getTelefone(); ?>" />
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao</label>
                <input type="text" class="form-control" name="descricao" id="descricao" autocomplete="off" value="<?php echo $result->getDescricao(); ?>" />
            </div>

            <button type=" submit" name="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>


</body>

</html>