<?php

namespace Entities;

use \Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 **/
class Contato
{
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    private $id;

    /** @ORM\Column(type="string") **/
    private $telefone;

    /** @ORM\Column(type="string") **/
    private $email;

    /** @ORM\Column(type="string") **/
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="contato")
     */
    private $pessoa;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    }
}
