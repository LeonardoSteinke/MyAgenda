<?php

include '../../../bootstrap.php';

use Controller\ContatoController;

$controller = new ContatoController;

$id = $_GET['contatoId'];
$pessoaId = $_GET['pessoaId'];
$controller->deletar($entityManager, $id);

header('location:index.php?pessoaId=' . $pessoaId . '');
