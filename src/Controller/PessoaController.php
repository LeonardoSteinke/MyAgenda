<?php

namespace Controller;

use Entities\Pessoa;

class PessoaController
{

    public function __construct()
    {
    }

    public function buscarTodos($em)
    {
        $result = $em->getRepository('Entities\Pessoa');

        return $result->findAll();
    }

    public function buscarPorId($em, $id)
    {
        $result = $em->find('Entities\Pessoa', $id);

        return $result;
    }

    public function inserir($em, array $input)
    {
        $pessoa = new Pessoa;
        $pessoa->setNome($input['nome'])
            ->setCpf($input['cpf']);

        $em->persist($pessoa);
        $em->flush();
    }

    public function atualizar($em, $id, array $input)
    {
        $pessoa = $this->buscarPorId($em, $id);
        $pessoa->setNome($input['nome'])
            ->setCpf($input['cpf']);

        $em->persist($pessoa);
        $em->flush();
    }

    function deletar($em, $id)
    {

        $pessoa = $this->buscarPorId($em, $id);

        $em->remove($pessoa);
        $em->flush();
    }
}
