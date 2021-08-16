<?php

namespace Controller;

use Entities\Contato;

class ContatoController
{

    public function __construct()
    {
    }

    public function buscarTodos($em, $id)
    {
        $result = $em->getRepository('Entities\Contato');

        return $result->findBy(['pessoa' => $id]);
    }

    public function buscarPorId($em, $id)
    {
        $result = $em->find('Entities\Contato', $id);

        return $result;
    }

    public function inserir($em, array $input, $id)
    {
        $pessoa = $em->find('Entities\Pessoa', $id);

        $contato = new Contato;
        $contato->setEmail($input['email'])
            ->setTelefone($input['telefone'])
            ->setDescricao($input['descricao'])
            ->setPessoa($pessoa);


        $em->persist($contato);
        $em->flush();
    }

    public function atualizar($em, $id, array $input)
    {
        $contato = $this->buscarPorId($em, $id);
        $contato->setEmail($input['email'])
            ->setTelefone($input['telefone'])
            ->setDescricao($input['descricao']);

        $em->persist($contato);
        $em->flush();
    }

    function deletar($em, $id)
    {

        $contato = $this->buscarPorId($em, $id);

        $em->remove($contato);
        $em->flush();
    }
}
