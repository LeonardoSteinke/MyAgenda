<?php

include '../../../bootstrap.php';

use Controller\PessoaController;

$controller = new PessoaController;

$id = $_GET['pessoaId'];
$controller->deletar($entityManager, $id);

header('location:../../index.php');
