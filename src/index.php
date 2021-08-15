<?php

namespace View;

use Controller\PessoaController;

include '../bootstrap.php';
include 'Controller/PessoaController.php';

$controller = new PessoaController;
$result = $controller->buscarTodos($entityManager);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Agenda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container my-5">
        <h2>My Agenda</h2>
        <button class="btn btn-primary my-4" onclick="window.location.href='View/Pessoa/addPessoa.php'">
            Adicionar Pessoa
        </button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result) {
                    foreach ($result as $pessoa) {
                        echo '<tr>
                           <th scope="row">' . $pessoa->getId() . '</th>
                           <th>' . $pessoa->getNome() . '</th>
                           <th>' . $pessoa->getCpf() . '</th>
                           <th> 
                           <button class="btn btn-success"> <a class="text-light" href="View/Contato/index.php?pessoaId=' . $pessoa->getId() . '">Contatos</a></button>
                           <button class="btn btn-primary"> <a class="text-light" href="View/Pessoa/updatePessoa.php?pessoaId=' . $pessoa->getId() . '">Editar</a></button>
                           <button class="btn btn-danger"> <a class="text-light" href="View/Pessoa/deletePessoa.php?pessoaId=' . $pessoa->getId() . '">Excluir</a></button> 
                           </th>';
                    }
                }


                ?>
            </tbody>

        </table>
    </div>
</body>



</html>
<scripts>

</scripts>