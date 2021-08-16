<?php

namespace View;

use Controller\ContatoController;
use Controller\PessoaController;

include '../../../bootstrap.php';

$id = $_GET['pessoaId'];

$controllerContato = new ContatoController;
$result = $controllerContato->buscarTodos($entityManager, $id);

$controllerPessoa = new PessoaController;

$nome = $controllerPessoa->buscarPorId($entityManager, $id)->getNome();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de <?= $nome ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container my-5">
        <h2>My Agenda</h2>
        <h4>Agenda de <?= $nome ?></h4>
        <button class="btn btn-danger my-3" onclick="window.location.href='../../index.php'">
            Voltar
        </button>
        <button class="btn btn-primary my-3" onclick="window.location.href='addContato.php?pessoaId=<?= $id ?>'">
            Adicionar Contato
        </button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result) {
                    foreach ($result as $contato) {
                        echo '<tr>
                           <th scope="row">' . $contato->getId() . '</th>
                           <th>' . $contato->getEmail() . '</th>
                           <th>' . $contato->getTelefone() . '</th>
                           <th>' . $contato->getDescricao() . '</th>
                           <th> 
                           <button class="btn btn-primary"> <a class="text-light" href="updateContato.php?contatoId=' . $contato->getId() . '&pessoaId=' . $id . '">Editar</a></button>
                           <button class="btn btn-danger"> <a class="text-light" href="deleteContato.php?contatoId=' . $contato->getId() . '&pessoaId=' . $id . '">Excluir</a></button> 
                           </th>
                           ';
                    }
                }

                ?>
            </tbody>

        </table>
    </div>

</body>

</html>