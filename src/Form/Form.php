<?php

namespace Form;

use Widgets\Elemento;
use Form\Campos;

class Form
{
    protected $campos;
    private $nome;
    private $elemento;

    public function __construct($nome = 'form')
    {
        $this->setNome($nome);
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEditavel($status)
    {
        if($this->campos)
        {
            foreach($this->campos as $item)
            {
                $item->setEditavel($status);
            }
        }
    }

    public function setCampos($campos)
    {
        foreach($campos as $item)
        {
            if($item instanceof Campos)
            {
                $nome = $item->getNome();
                $this->campos[$nome] = $item;

                if($item instanceof Botao)
                {
                    $item->setFormNome($this->nome);
                }
            }
        }
    }

    public function getCampo($nome)
    {
        return $this->campos[$nome];
    }

    public function setDados($obj)
    {
        foreach($this->campos as $nome => $campo)
        {
            if($nome)
            {
                $campo->setValor($obj->nome);
            }
        }
    }

    public function getDados($class = 'StdClass')
    {
        $obj = new $class;

        foreach($_POST as $indice => $valor)
        {
            if(get_class($this->campos[$indice]) ==  'Combo')
            {
                if($valor !== '0')
                {
                    $obj->$indice = $valor;
                }
            }
            else
            {
                $obj->$indice = $valor;
            }
        }

        foreach($_FILES as $indice => $valor)
        {
            $obj->$indice = $valor['tmp_name'];
        }

        return $obj;
    }

    public function adicionar($obj)
    {
        $this->elemento[] = $obj;
    }

    public function render()
    {
        // Instancia a tag de formulário
        $tag = new Elemento('form');
        $tag->name = $this->nome;
        $tag->method = 'post';

        // adiciona o objeto filho ao formulário
        foreach($this->elemento as $item)
        {
            $tag->adicionar($item);
        }

        // exibe o formulário
        $tag->render();
    }
}