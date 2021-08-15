<?php

namespace Entities;

use \Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 **/
class Pessoa
{
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    private $id;

    /** @ORM\Column(type="string", nullable=false) **/
    private $nome;

    /** @ORM\Column(type="string", length=12, unique=true, nullable=false) **/
    private $cpf;


    /**
     * @ORM\OneToMany(targetEntity="Contato", mappedBy="pessoa", cascade={"persist", "remove", "merge"})
     */
    private $contato;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }
    public function getContato()
    {
        return $this->contato;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
        return $this;
    }
}
