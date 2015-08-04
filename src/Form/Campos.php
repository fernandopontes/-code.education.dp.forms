<?php

namespace Form;


use Widgets\Elemento;

class Campos
{
    protected $nome;
    protected $tamanho;
    protected $valor;
    protected $editavel;
    protected $tag;

    public function __construct($nome)
    {
        self::setEditavel(true);
        self::setNome($nome);
        self::setTamanho(200);

        $this->tag = new Elemento('input');
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getEditavel()
    {
        return $this->editavel;
    }

    public function setEditavel($editavel)
    {
        $this->editavel = $editavel;
    }

    public function setPropriedade($nome, $valor)
    {
        $this->tag->$nome = $valor;
    }
}